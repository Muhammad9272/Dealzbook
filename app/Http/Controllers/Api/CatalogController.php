<?php

namespace App\Http\Controllers\Api;

use App\Catalog;
use App\Http\Controllers\Controller;
use App\Image;
use App\Pdf;
use App\Seo;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Page;
use Illuminate\Support\Facades\Storage;

use App\City;
use App\Country;
use App\Store;
use App\Branch;
use Carbon\Carbon;


use DataTables;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
    {
      $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        // dd(767);
         $datas = Catalog::orderBy('id','desc');
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('name', function(Catalog $data) {
                                return $data->name;
                             })
                            ->editColumn('store_id', function(Catalog $data) {
                                return $data->store->name;
                             })
                            ->editColumn('country_id', function(Catalog $data) {
                                return $data->city->country->name;
                             })
                            ->editColumn('city_id', function(Catalog $data) {
                                return $data->city->name;
                             })
                            ->addColumn('featured', function(Catalog $data) {
                                $class = $data->featured == 1 ? 'green' : 'red';
                                $s = $data->featured == 1 ? 'selected' : '';
                                $ns = $data->featured == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-catalogs-featured',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Featured</option><option data-val="0" value="'. route('admin-catalogs-featured',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Not Featured</option>/select></div>';
                            })

                            ->addColumn('status', function(Catalog $data) {
                                $class = $data->status == 1 ? 'green' : 'red';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-catalogs-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-catalogs-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })

                            ->addColumn('action', function(Catalog $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-catalogs-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                <a data-href="'.route('admin-catalogs-delete',$data->id).'" class="btn btn-outline delete-data  btn-sm red" data-toggle="confirmation" data-placement="top" data-id="'.$data->id.'" >
                                    <i class="fa fa-trash"></i> Delete </a>
                                
                                </div>

                                ';
                            })
                            ->rawColumns(['featured','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


    public function index()
    {       
        // return Country::get();
        return view('admin.catalogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        $stores=Store::where('status',1)->get();
        $tags=Tag::where('status',1)->get();
        return view('admin.catalogs.create',compact('countries','stores','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          //--- Validation Section

        $rules = [
            'name' => 'required|max:500',
            'arabic_name' => 'required|max:255',
            'start_at' => 'required',
            'store' => 'required',
            'city' => 'required',
            'country' => 'required',
            'branches' => 'required',
            'description'=> 'required',
            'arabic_description'=> 'required',            
            'cover_photo'=>'required_if:addMediaRadios,11',
            'pdfFile'=>'required_if:addMediaRadios,22',
            
            // 'page_description' => 'required',
            // 'page_arabic_description' => 'required',
                ];
        $customs = ['cover_photo.required_if' => 'Cover Photo Required',
                    'pdfFile.required_if' => ' Pdf file Required'];

        $validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        
        // if($request->addMediaRadios=="11"){
        //     $rules = [
        //         'cover_photo'=>'required'
        //         ];

        //     $validator = Validator::make($request->all(), $rules);

        //     if ($validator->fails()) {
        //       return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        //     }



        $catalog = new Catalog;

        //name
        $catalog->setTranslation('name', 'en', $request->name);
        $catalog->setTranslation('name', 'ar', $request->arabic_name);

        $catalog->slug = Str::of($request->name)->slug('-');

        //description
        $catalog->setTranslation('description', 'en', $request->description);
        $catalog->setTranslation('description', 'ar', $request->arabic_description);

        //start at
        $catalog->setTranslation('start_at', 'en', $request->start_at);
        $catalog->setTranslation('start_at', 'ar', $request->arabic_start_at);

        //if catalog has no expiry
        //then set the to null
        if (!$request->for_unlimited_time) {
            $catalog->setTranslation('end_at', 'en', null);
            $catalog->setTranslation('end_at', 'ar', null);
        }
        else{
            $catalog->setTranslation('end_at', 'en', $request->end_at);
            $catalog->setTranslation('end_at', 'ar', $request->arabic_end_at);
        }

        $catalog->store_id = $request->store;
        $catalog->city_id = $request->city;
        $catalog->country_id = $request->country;
        $catalog->link = $request->link;
        //check whether the catalog is
        //marked as featured
        //if yes, then save it
        // if($request->featured && $request->featured_expiry_at != null){
        //     $catalog->featured = true;
        //     $catalog->featured_expiry_at =  $request->featured_expiry_at;
        // }


        // $attachments=[];  
        // if($request->hasFile('attachments')){    
        //     foreach ($request->attachments as $file) {   

        //        $name = time().$file->getClientOriginalName();
        //        $file->move('assets/pdfs/',$name);           
        //        $attachments[] = $name;
            
        //     }
        //     $catalog->attachments =json_encode($attachments);
        // }
        // else{
        //     $catalog->attachments=null;
        // }

        
        $catalog->save();

        /*
        * associate the seo tags with
        * the store's catalog
        */
        $seoTags = new Seo;
        $seoTags->setTranslation('title', 'en', $request->seo_title);
        $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
        $seoTags->setTranslation('description', 'en', $request->seo_description);
        $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);

        $catalog->seoTags()->save($seoTags);
        

        // sync the catalog tags
        $catalog->tags()->sync($request->tags);

        // sync catalog with the branches
        $catalog->branches()->sync($request->branches);

        

        // $catalog->imagesStore()->sync($images);
 
        $models=[];
        if($request->addMediaRadios=="11"){
            $index=0;
            $images=explode(',',$request->catalog_images);
            if(count($images)>0 && $images[0]!=""){

                foreach($images as $image){
                    $values['image']=$image;
                    $values['imageable_id']=$catalog->id;
                    $values['imageable_type']='App\Catalog';         
                    $index++;
                    $models[]=$values;
                    
                }
               $catalog->imagesStore()->createMany($models);
            }

            $image = new Image;
            $image->image = $request->cover_photo;
            $image->featured = true;
            $image->catalog_id=$catalog->id;
            $response = $catalog->images()->save($image);

            
            $catalog->attachments=null;
            $catalog->update();
           

        }
        
        else if($request->addMediaRadios=="22"){

            if($request->pdfs && $request->pdfs!='[]'){
                $file = $request->file('pdfFile');
                $name = time().$file->getClientOriginalName();
                $file->move('assets/pdfs/',$name);
                $catalog->attachments = $name;
                $catalog->update();

                foreach($request->pdfs as $key=>$image){     
                     
                    $image = str_replace('data:image/jpeg;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);

                    $image_name = $key.time(). '.png'; 
                    $path = public_path().'/assets/images/dealzbook/'. $image_name;
                    $path1 = url('/').'/assets/images/dealzbook/'. $image_name;
                    file_put_contents($path,base64_decode($image));
                    if($key==0){
                        $image = new Image;
                        $image->image = $path1;
                        $image->featured = true;
                        $image->catalog_id=$catalog->id;
                        $response = $catalog->images()->save($image);
                    }
                    else{
                        $values['image']=$path1;
                        $values['imageable_id']=$catalog->id;
                        $values['imageable_type']='App\Catalog';         
                        $models[]=$values;
                    }
                    
                }
                $catalog->imagesStore()->createMany($models);
            }
        }





        // add the page description
        // $page = new Page;
        // $page->setTranslation('description', 'en', $request->page_description);
        // $page->setTranslation('description', 'ar', $request->page_arabic_description);
        // $catalog->page()->save($page);

        $msg = 'Data Added Successfully.';
        return response()->json($msg); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries=Country::all();
        $stores=Store::where('status',1)->get();
        $tags=Tag::where('status',1)->get();
        $data=Catalog::findOrFail($id);
        return view('admin.catalogs.edit',compact('countries','stores','tags','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {  

        //dd($request->pdfs);
         //--- Validation Section
        $rules = [
            'name' => 'required|max:500',
            'arabic_name' => 'required|max:255',
            'start_at' => 'required',
            'store' => 'required',
            'city' => 'required',
            'country' => 'required',
            'branches' => 'required',
            'description'=> 'required',
            'arabic_description'=> 'required',
            // 'page_description' => 'required',
            // 'page_arabic_description' => 'required'
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $catalog = Catalog::find($id);

        //name
        $catalog->setTranslation('name', 'en', $request->name);
        $catalog->setTranslation('name', 'ar', $request->arabic_name);

        $catalog->slug = Str::of($request->name)->slug('-');

        //description
        $catalog->setTranslation('description', 'en', $request->description);
        $catalog->setTranslation('description', 'ar', $request->arabic_description);

        //start at
        $catalog->setTranslation('start_at', 'en', $request->start_at);
        $catalog->setTranslation('start_at', 'ar', $request->arabic_start_at);

        //if catalog has no expiry
        //then set the to null
        if (!$request->for_unlimited_time) {
            $catalog->setTranslation('end_at', 'en', null);
            $catalog->setTranslation('end_at', 'ar', null);
        }
        else{
            $catalog->setTranslation('end_at', 'en', $request->end_at);
            $catalog->setTranslation('end_at', 'ar', $request->arabic_end_at);
        }

        //check whether the catalog is
        //marked as featured
        //if yes, then save it
        // if($request->featured && $request->featured_expiry_at != null){
        //     $catalog->featured = true;
        //     $catalog->featured_expiry_at =  $request->featured_expiry_at;
        // }else{
        //     $catalog->featured = false;
        //     $catalog->featured_expiry_at =  null;
        // }

        $catalog->store_id = $request->store;
        $catalog->link = $request->link;
        $catalog->city_id = $request->city;
        $catalog->country_id = $request->country;

        // Add & Update pdfs
            // $attachments=[];  
            // if(!empty($catalog->attachments) && !is_null($catalog->attachments)){
            //     foreach (json_decode($catalog->attachments) as  $key => $file){

            //         if( !is_null($request->old) && in_array($key, $request->old) ){
            //             $attachments[]=$file;
            //         }
            //         else{
            //              if (file_exists(public_path().'/assets/pdfs/'.$file)) {
            //                  unlink(public_path().'/assets/pdfs/'.$file);
            //              }
            //         }
            //     }
            // }

            // if($request->attachments){
            //     foreach($request->attachments as $file){

            //        $name = time().$file->getClientOriginalName();
            //        $file->move('assets/pdfs/',$name);           
            //        $attachments[] = $name;
            //     }

            // }

            // $catalog->attachments = json_encode($attachments);

            // // if empty pdfs
            // if ( $catalog->attachments == "[]"  ) {
            //     $catalog->attachments =null;
            // }

        // Add & Update pdfs Ends




        $catalog->update();

        /*
        * associate the seo tags with
        * the store's catalog
        */
        $seoTags = $catalog->seoTags;
        $seoTags->setTranslation('title', 'en', $request->seo_title);
        $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
        $seoTags->setTranslation('description', 'en', $request->seo_description);
        $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);

        $catalog->seoTags()->save($seoTags);

        // sync the catalog tags
        // if the user has updated
        // if($request->tags && count($request->tags) && !is_array($request->tags[0])){
            $catalog->tags()->sync($request->tags); // if provided with tags
        // }elseif( count($request->tags) == 0){
        //     $catalog->tags()->sync([]); // if provided with no tags
        // }else{

        // }

        // sync catalog with the branches
        // if( count($request->branches) &&  !is_array($request->branches[0])){
            $catalog->branches()->sync($request->branches); // if provided branches
        // }elseif( count($request->branches) == 0){
        //     $catalog->branches()->sync([]); // if provided with no branches
        // }else{

        // }
        
        
        // if($request->catalog_images){
        //     foreach ($catalog->images()->where("featured",'!=',1)->get() as $gal) {
        //         $gal->delete();
        //     }
        //  }

        $models=[];
        if($request->addMediaRadios=="11"){
            $index=0;
            $images=explode(',',$request->catalog_images);
            if(count($images)>0 && $images[0]!=""){

                foreach ($catalog->images()->where("featured",'!=',1)->get() as $gal) {
                        $file= $this->getFilename($gal->image);
                        if (file_exists(public_path().'/assets/images/dealzbook/'.$file)) {
                            unlink(public_path().'/assets/images/dealzbook/'.$file);
                        }
                        $gal->delete();
                    }
                foreach($images as $image){
                    $values['image']=$image;
                    $values['imageable_id']=$catalog->id;
                    $values['imageable_type']='App\Catalog';         
                    $index++;
                    $models[]=$values;
                    
                }
               $catalog->imagesStore()->createMany($models);
            }

            if($request->cover_photo){
                $featured=$catalog->images()->where("featured",1)->first();
                $featured->image=$request->cover_photo;
                $featured->update();
            } 
            if($catalog->attachments != null)
            {  
                if (file_exists(public_path().'/assets/pdfs/'.$catalog->attachments)) {
                    unlink(public_path().'/assets/pdfs/'.$catalog->attachments);
                }                
            }
            $catalog->attachments=null;
            $catalog->update();

        }
        
        else if($request->addMediaRadios=="22" && $request->pdfs && $request->pdfs!='[]'){
            $file = $request->file('pdfFile');
            $name = time().$file->getClientOriginalName();
            $file->move('assets/pdfs/',$name);
            if($catalog->attachments != null)
            {
                if (file_exists(public_path().'/assets/pdfs/'.$catalog->attachments)) {
                    unlink(public_path().'/assets/pdfs/'.$catalog->attachments);
                }
            }
            $catalog->attachments = $name;
            $catalog->update();
            


            foreach ($catalog->images()->where("featured",'!=',1)->get() as $gal) {
                $file= $this->getFilename($gal->image);
                if (file_exists(public_path().'/assets/images/dealzbook/'.$file)) {
                    unlink(public_path().'/assets/images/dealzbook/'.$file);
                }
                
                $gal->delete();
            }
            foreach($request->pdfs as $key=>$image){     
                 
                $image = str_replace('data:image/jpeg;base64,', '', $image);
                $image = str_replace(' ', '+', $image);

                $image_name = $key.time(). '.png'; 
                $path = public_path().'/assets/images/dealzbook/'. $image_name;
                $path1 = url('/').'/assets/images/dealzbook/'. $image_name;
                file_put_contents($path,base64_decode($image));
                if($key==0){
                     $featured=$catalog->images()->where("featured",1)->first();
                     $featured->image=$path1;
                     $featured->update();
                }
                else{
                    $values['image']=$path1;
                    $values['imageable_id']=$catalog->id;
                    $values['imageable_type']='App\Catalog';         
                    $models[]=$values;
                }
                
            }
            $catalog->imagesStore()->createMany($models);
        }
        
        //dd($request->pdfs);

        //update the page description
        // $page = $catalog->page;
        // $page->setTranslation('description', 'en', $request->page_description);
        // $page->setTranslation('description', 'ar', $request->page_arabic_description);
        // $catalog->page()->save($page);

        $msg = 'Data Updated Successfully.';
        return response()->json($msg); 

    }

    /**
     * Save the updated order of the
     * catalog images
     */
    public function reorderImages(Request $request)
    {

        foreach($request->images as $key=> $image){
            $imageModel = Image::find($image['id']);
            $imageModel->update(['order' => ++$key]);
        }

    }

    /**
     * Toggle the catalog status
     */
    public function status($id1,$id2) {

         $data = Catalog::findOrFail($id1);
          $data->status = $id2;
          $data->update();
    }

    public function featured($id1,$id2) {

  
         $data = Catalog::findOrFail($id1);
          $data->featured = $id2;
          if($id2==1){
            $data->featured_expiry_at = Carbon::now()->addYears(5);
          }
          else{
             $data->featured_expiry_at =  null;
          }
          $data->update();
    }


    /**
     * Store a catalog image
     */
    public function storeImages(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
            'file' => 'required'
        ]);

        $new_image = request()->file('file')->store('catalogs', 's3');

        $catalog = Catalog::find($request->id);

        $image = new Image;

        $image->image = $new_image;
        $response = $catalog->images()->save($image);

        /*
        * if this imag has been marked as
        * featured, then save with the catalog
        */
        if($request->featured == 'true'){
            // $catalog->image_id = $response->id;
            // $catalog->save();
            $image->featured = true;

            $response = $catalog->images()->save($image);
        }
    }

     /**
     * Store a catalog pdf
     */
    public function storePdf(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
            'file' => 'required'
        ]);

        $new_pdf = request()->file('file')->store('catalogs', 's3');
        $path = $request->file('file')->store('public/catalogs', 'local');
        $catalog = Catalog::find($request->id);

        $pdf = new Pdf;

        $pdf->pdf = $new_pdf;
        $catalog->pdfs()->save($pdf);

    }

    public function toggleFeaturedImage(Request $request){
        $validatedData = $request->validate([
            'image' => 'required',
        ]);

        $image = Image::find($request->image['id']);
        $image->featured = !$image->featured;
        $image->save();

    }
    
    public function getFilename($url)
    {
        $pos = strrpos($url, '/');
        $name = $pos === false ? $url : substr($url, $pos + 1);
        return $name;
    }
    /**
     * delete a catalog image
     */
    public function deleteImage(Request $request)
    {
        $catalog = Catalog::find($request->image['imageable_id']);
        $catalog->images()->where('id', $request->image['id'])->delete();
    }
 
     /**
     * delete a catalog pdf
     */
    public function deletePdf(Request $request)
    {
        $catalog = Catalog::find($request->pdf['pdfable_id']);
        $catalog->pdfs()->where('id', $request->pdf['id'])->delete();
    }

    public function load($id)
    {
        $data = Branch::where('store_id',$id)->pluck('name','id');     
        return response()->json($data);

        // 
        // return view('admin.load.branch',compact('branches'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $catalog = Catalog::findOrFail($id);

          if($catalog->images()->count()>0){
            foreach ($catalog->images()->get() as $gal) {
                $file= $this->getFilename($gal->image);
                if (file_exists(public_path().'/assets/images/dealzbook/'.$file)) {
                    unlink(public_path().'/assets/images/dealzbook/'.$file);
                }                
                $gal->delete();
            }            
          }

          if($catalog->attachments != null)
          {
                if (file_exists(public_path().'/assets/pdfs/'.$catalog->attachments)) {
                    unlink(public_path().'/assets/pdfs/'.$catalog->attachments);
                }
          }
          $catalog->delete();
           
          return response()->json("Data deleted Successfully !");
    }
}
