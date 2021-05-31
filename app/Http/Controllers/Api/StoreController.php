<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Page;
use App\Seo;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use DataTables;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
class StoreController extends Controller
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
         $datas = Store::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('name', function(Store $data) {
                                return $data->name;
                             })
                            ->addColumn('status', function(Store $data) {
                                $class = $data->status == 1 ? 'green' : 'red';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-store-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-store-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('featured', function(Store $data) {
                                $class = $data->featured == 1 ? 'green' : 'red';
                                $s = $data->featured == 1 ? 'selected' : '';
                                $ns = $data->featured == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-store-featured',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Featured</option><option data-val="0" value="'. route('admin-store-featured',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Not-Featured</option>/select></div>';
                            })

                            ->addColumn('action', function(Store $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-store-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                
                                </div>

                                ';
                            })
                            ->rawColumns(['featured','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


    public function index()
    {       
        // return Country::get();
        return view('admin.store.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.store.create');
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
                    'profilePicture' => 'required',
                    'name' => 'required|unique:stores|max:255',
                    'arabicName' => 'required',
                    'about' => 'required',
                    'arabicAbout' => 'required',
                    'description' => 'required',
                    'arabic_description' => 'required',
                    ];

            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
              return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }

    
            $store = new Store;
            $store->image = $request->profilePicture;
            
            //$store->name = Str::of($request->name)->trim();
            $store->setTranslation('name', 'en', $request->name);
            $store->setTranslation('name', 'ar', $request->arabicName);
           
            $store->slug = Str::of($request->name)->slug('-');
            $store->website_link = Str::of($request->websiteLink)->trim();
            $store->facebook_link = Str::of($request->facebookLink)->trim();
            $store->twitter_link = Str::of($request->twitterLink)->trim();
            $store->instagram_link = Str::of($request->instagramLink)->trim();
            $store->youtube_link = Str::of($request->youtubeLink)->trim();
            // $store->about = Str::of($request->about)->trim();

             //$store->name = Str::of($request->name)->trim();
            $store->setTranslation('about', 'en', $request->about);
            $store->setTranslation('about', 'ar', $request->arabicAbout);

            $store->save();

            /*
            * add the store's seo tags
            */
            $seoTags = new Seo; 
            $seoTags->setTranslation('title', 'en', $request->seo_title);
            $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
            $seoTags->setTranslation('description', 'en', $request->seo_description);
            $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);
            $store->seoTags()->save($seoTags);

            // add the page description
            $page = new Page; 
            $page->setTranslation('description', 'en', $request->description);
            $page->setTranslation('description', 'ar', $request->arabic_description);
            $store->page()->save($page);
                
            $msg="Data Added Successfully!";
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
         $data=Store::findOrFail($id);        
        return view('admin.store.edit',compact('data'));
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
       // dd(Str::of($request->websiteLink)->trim());
       // Str::of($request->websiteLink)->trim();

        //--- Validation Section
        $rules = [
                'name' => 'required|max:255',
                'about' => 'required',
                'description' => 'required',
                'arabic_description' => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $store = Store::find($id);
       
        if ($request->profilePicture) {
            $store->image = $request->profilePicture;
        }

        $store->setTranslation('name', 'en', $request->name);
        $store->setTranslation('name', 'ar', $request->arabicName);

        $store->slug = Str::of($request->name)->slug('-');
        $store->website_link = Str::of($request->websiteLink)->trim();
        $store->facebook_link = Str::of($request->facebookLink)->trim();
        $store->twitter_link = Str::of($request->twitterLink)->trim();
        $store->instagram_link = Str::of($request->instagramLink)->trim();
        $store->youtube_link = Str::of($request->youtubeLink)->trim();
        //$store->about = Str::of($request->about)->trim();
        $store->setTranslation('about', 'en', $request->about);
        $store->setTranslation('about', 'ar', $request->arabicAbout);

        /*
        * update the store's seo tags
        */
        $seoTags = $store->seoTags; 
        $seoTags->setTranslation('title', 'en', $request->seo_title);
        $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
        $seoTags->setTranslation('description', 'en', $request->seo_description);
        $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);
        $store->seoTags()->save($seoTags);

        $store->save();

        //update the page description
        $page = $store->page; 
        $page->setTranslation('description', 'en', $request->description);
        $page->setTranslation('description', 'ar', $request->arabic_description);
        $store->page()->save($page);

        $msg="Data Updated Successfully!";
        return response()->json($msg);
    }
    /**
     * Toggle the store status
     */


    public function status($id1,$id2)
      {
          $data = Store::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }

    public function featured($id1,$id2)
      {
          $data = Store::findOrFail($id1);
          $data->featured = $id2;
          $data->update();
      }



    /*
    * Get all the branches of the store
    */
    public function storeBranches(Store $store, Request $request){
        return $store->branches;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
