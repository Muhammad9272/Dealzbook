<?php

namespace App\Http\Controllers\Api;

use App\Branch;
use App\City;
use App\Country;
use App\Coupon;
use App\Http\Controllers\Controller;
use App\Image;
use App\Page;
use App\Pdf;
use App\Seo;
use App\Store;
use App\Tag;
use Auth;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Validator;


class CouponController extends Controller
{

     //*** JSON Request
    public function datatables()
    {
        // dd(767);
         $datas = Coupon::orderBy('id','desc');
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('name', function(Coupon $data) {
                                return $data->name;
                             })
                            ->editColumn('store_id', function(Coupon $data) {
                                return $data->store?$data->store->name:'';
                             })
                            ->editColumn('country_id', function(Coupon $data) {
                                return $data->country?$data->country->name:'';
                             })
                           
                            ->addColumn('featured', function(Coupon $data) {
                                $class = $data->featured == 1 ? 'green' : 'red';
                                $s = $data->featured == 1 ? 'selected' : '';
                                $ns = $data->featured == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-coupon-featured',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Featured</option><option data-val="0" value="'. route('admin-coupon-featured',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Not Featured</option>/select></div>';
                            })

                            ->addColumn('status', function(Coupon $data) {
                                $class = $data->status == 1 ? 'green' : 'red';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-coupon-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-coupon-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })

                            ->addColumn('action', function(Coupon $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-coupon-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                <a data-href="'.route('admin-coupon-delete',$data->id).'" class="btn btn-outline delete-data  btn-sm red" data-toggle="confirmation" data-placement="top" data-id="'.$data->id.'" >
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
        return view('admin.coupons.index');
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
        return view('admin.coupons.create',compact('countries','stores','tags'));
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
            // 'start_at' => 'required_if:addMediaRadios,22',
            'store' => 'required',
            // 'city' => 'required',
            'country' => 'required',
            // 'branches' => 'required',
            'description'=> 'required',
            'arabic_description'=> 'required',            
            'cover_photo'=>'required',
            // 'pdfFile'=>'required_if:addMediaRadios,22',
            
            // 'page_description' => 'required',
            // 'page_arabic_description' => 'required',
                ];
        $customs = ['cover_photo' => 'Cover Photo Required'
                    ];

        $validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        
        $coupon = new Coupon;

        //name
        $coupon->setTranslation('name', 'en', $request->name);
        $coupon->setTranslation('name', 'ar', $request->arabic_name);

        $coupon->slug = Str::of($request->name)->slug('-');

        //description
        $coupon->setTranslation('description', 'en', $request->description);
        $coupon->setTranslation('description', 'ar', $request->arabic_description);

        //start at
        if (!$request->for_unlimited_stime) {
        $coupon->setTranslation('start_at', 'en', null);
        $coupon->setTranslation('start_at', 'ar', null);}
        else{
             $coupon->setTranslation('start_at', 'en', $request->start_at);
             $coupon->setTranslation('start_at', 'ar', $request->arabic_start_at);
        }

        //if catalog has no expiry
        //then set the to null
        if (!$request->for_unlimited_time) {
            $coupon->setTranslation('end_at', 'en', null);
            $coupon->setTranslation('end_at', 'ar', null);
        }
        else{
            $coupon->setTranslation('end_at', 'en', $request->end_at);
            $coupon->setTranslation('end_at', 'ar', $request->arabic_end_at);
        }

        $coupon->store_id = $request->store;
        // $coupon->city_id = $request->city;
        $coupon->country_id = $request->country;
        $coupon->link = $request->link;
        $coupon->image = $request->cover_photo;
        $coupon->coupon_code=$request->coupon_code;
        //$coupon->attachments=explode(',',$request->coupon_images);
        //check whether the catalog is

        
        $coupon->save();

        /*
        * associate the seo tags with
        * the store's catalog
        */
        $seoTags = new Seo;
        $seoTags->setTranslation('title', 'en', $request->seo_title);
        $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
        $seoTags->setTranslation('description', 'en', $request->seo_description);
        $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);

        $coupon->seoTags()->save($seoTags);
        
        // sync the catalog tags
        $coupon->tags()->sync($request->tags);
           
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
        $data=Coupon::findOrFail($id);
        return view('admin.coupons.edit',compact('countries','stores','tags','data'));
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
            // 'start_at' => 'required',
            'store' => 'required',
            // 'city' => 'required',
            'country' => 'required',
            // 'branches' => 'required',
            'description'=> 'required',
            'arabic_description'=> 'required',
            // 'page_description' => 'required',
            // 'page_arabic_description' => 'required'
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $coupon = Coupon::find($id);

        //name
        $coupon->setTranslation('name', 'en', $request->name);
        $coupon->setTranslation('name', 'ar', $request->arabic_name);

        $coupon->slug = Str::of($request->name)->slug('-');

        //description
        $coupon->setTranslation('description', 'en', $request->description);
        $coupon->setTranslation('description', 'ar', $request->arabic_description);

        if (!$request->for_unlimited_stime) {
        $coupon->setTranslation('start_at', 'en', null);
        $coupon->setTranslation('start_at', 'ar', null);}
        else{
             $coupon->setTranslation('start_at', 'en', $request->start_at);
             $coupon->setTranslation('start_at', 'ar', $request->arabic_start_at);
        }

        //if catalog has no expiry
        //then set the to null
        if (!$request->for_unlimited_time) {
            $coupon->setTranslation('end_at', 'en', null);
            $coupon->setTranslation('end_at', 'ar', null);
        }
        else{
            $coupon->setTranslation('end_at', 'en', $request->end_at);
            $coupon->setTranslation('end_at', 'ar', $request->arabic_end_at);
        }

        //check whether the catalog is
        //marked as featured
        //if yes, then save it
        // if($request->featured && $request->featured_expiry_at != null){
        //     $coupon->featured = true;
        //     $coupon->featured_expiry_at =  $request->featured_expiry_at;
        // }else{
        //     $coupon->featured = false;
        //     $coupon->featured_expiry_at =  null;
        // }

        $coupon->store_id = $request->store;
        $coupon->link = $request->link;
        $coupon->city_id = $request->city;
        $coupon->country_id = $request->country;
        $coupon->image = $request->cover_photo;
        $coupon->coupon_code=$request->coupon_code;
       




        $coupon->update();

        /*
        * associate the seo tags with
        * the store's catalog
        */
        $seoTags = $coupon->seoTags;
        $seoTags->setTranslation('title', 'en', $request->seo_title);
        $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
        $seoTags->setTranslation('description', 'en', $request->seo_description);
        $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);

        $coupon->seoTags()->save($seoTags);

            $coupon->tags()->sync($request->tags); // if provided with tags


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

         $data = Coupon::findOrFail($id1);
          $data->status = $id2;
          $data->update();
    }

    public function featured($id1,$id2) {

  
         $data = Coupon::findOrFail($id1);
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

        $coupon = Coupon::find($request->id);

        $image = new Image;

        $image->image = $new_image;
        $response = $coupon->images()->save($image);

        /*
        * if this imag has been marked as
        * featured, then save with the catalog
        */
        if($request->featured == 'true'){
            // $coupon->image_id = $response->id;
            // $coupon->save();
            $image->featured = true;

            $response = $coupon->images()->save($image);
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
        $coupon = Coupon::find($request->id);

        $pdf = new Pdf;

        $pdf->pdf = $new_pdf;
        $coupon->pdfs()->save($pdf);

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
        $coupon = Coupon::find($request->image['imageable_id']);
        $coupon->images()->where('id', $request->image['id'])->delete();
    }
 
     /**
     * delete a catalog pdf
     */
    public function deletePdf(Request $request)
    {
        $coupon = Coupon::find($request->pdf['pdfable_id']);
        $coupon->pdfs()->where('id', $request->pdf['id'])->delete();
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
          $coupon = Coupon::findOrFail($id);

          // if($coupon->images()->count()>0){
          //   foreach ($coupon->images()->get() as $gal) {
          //       $file= $this->getFilename($gal->image);
          //       if (file_exists(public_path().'/assets/images/dealzbook/'.$file)) {
          //           unlink(public_path().'/assets/images/dealzbook/'.$file);
          //       }                
          //       $gal->delete();
          //   }            
          // }

          // if($coupon->attachments != null)
          // {
          //       if (file_exists(public_path().'/assets/pdfs/'.$coupon->attachments)) {
          //           unlink(public_path().'/assets/pdfs/'.$coupon->attachments);
          //       }
          // }
          $coupon->delete();
           
          return response()->json("Data deleted Successfully !");
    }
}
