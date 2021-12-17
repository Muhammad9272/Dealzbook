<?php

namespace App\Http\Controllers\Api;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use DataTables;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
class BlogController extends Controller
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
         $datas = Blog::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                             ->editColumn('title', function(Blog $data) {
                                return $data->title;
                             })
                             ->addColumn('status', function(Blog $data) {
                                $class = $data->status == 1 ? 'green' : 'red';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-blogs-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-blogs-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })

                            ->addColumn('action', function(Blog $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-blogs-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                <a data-href="'.route('admin-blogs-delete',$data->id).'" class="btn btn-outline delete-data  btn-sm red" data-toggle="confirmation" data-placement="top" data-id="'.$data->id.'" >
                                    <i class="fa fa-trash"></i> Delete </a>
                                
                                </div>

                                ';
                            })
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
                    'small_detail' => 'required',
                    'arabic_small_detail' => 'required',                
                    'profilePicture' => 'required',
                    'title' => 'required',
                    'arabic_title' => 'required',
                    'body' => 'required',
                    'arabic_body' => 'required',
                    'seo_title' => 'required',
                    'arabic_seo_title' => 'required',
                    'seo_description' => 'required',
                    'arabic_seo_description' => 'required'
                    ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
              return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }



            $blog = new Blog;

            $blog->image = $request->profilePicture;

            $blog->slug = Str::of($request->title)->slug('-');

            $blog->setTranslation('title', 'en', $request->title);
            $blog->setTranslation('title', 'ar', $request->arabic_title);

            $blog->setTranslation('small_detail', 'en', $request->small_detail);
            $blog->setTranslation('small_detail', 'ar', $request->arabic_small_detail);


            $blog->setTranslation('body', 'en', $request->body);
            $blog->setTranslation('body', 'ar', $request->arabic_body);

            $blog->save();

            /*
            * add the blogs's seo tags
            */
            $seoTags = new Seo;
            $seoTags->setTranslation('title', 'en', $request->seo_title);
            $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
            $seoTags->setTranslation('description', 'en', $request->seo_description);
            $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);
            $blog->seoTags()->save($seoTags);

               $msg = 'Data added Successfully.';
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
        $data=Blog::findOrFail($id);        
        return view('admin.blog.edit',compact('data'));
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

          //--- Validation Section
        $rules = [
            'small_detail' => 'required',
            'arabic_small_detail' => 'required',            
            'title' => 'required',
            'arabic_title' => 'required',
            'body' => 'required',
            'arabic_body' => 'required',
            'seo_title' => 'required',
            'arabic_seo_title' => 'required',
            'seo_description' => 'required',
            'arabic_seo_description' => 'required'
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $blog = Blog::find($id);

        if (!empty($request->profilePicture)) {
            $blog->image = $request->profilePicture;
        }

        $blog->slug = Str::of($request->title)->slug('-');

        $blog->setTranslation('title', 'en', $request->title);
        $blog->setTranslation('title', 'ar', $request->arabic_title);

        $blog->setTranslation('body', 'en', $request->body);
        $blog->setTranslation('body', 'ar', $request->arabic_body);

        $blog->setTranslation('small_detail', 'en', $request->small_detail);
        $blog->setTranslation('small_detail', 'ar', $request->arabic_small_detail);


        $blog->update();

        /*
        * update the blog's seo tags
        */
        $seoTags = $blog->seoTags;
        $seoTags->setTranslation('title', 'en', $request->seo_title);
        $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
        $seoTags->setTranslation('description', 'en', $request->seo_description);
        $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);
        $blog->seoTags()->save($seoTags);

        $msg = 'Data Updated Successfully.';
        return response()->json($msg); 
    }

    /*
    * Upload the image to the s3
    * and return the url
    */
    public function uploadImage(Request $request){

        $image =  request()->file('image')->store('blog', 's3');

        return 'https://ecatalog.s3-ap-southeast-1.amazonaws.com/' . $image;

    }

    /**
     * Toggle the Blog status
     */
    public function status($id1,$id2)
      {
          $data = Blog::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $data = Blog::findOrFail($id);
          $data->delete();
          return response()->json("Data deleted Successfully !");
    }
}
