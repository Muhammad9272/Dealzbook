<?php

namespace App\Http\Controllers\Api;

use App\About;
use App\Blog;
use App\Http\Controllers\Controller;
use App\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
class AboutController extends Controller
{

     public function __construct()
    {
      $this->middleware('auth:admin');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return About::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id){
            // update the store information
            return $this->update($request);
        }
        else{
            $validatedData = $request->validate([
                'small_detail' => 'required',
                'arabic_small_detail' => 'required',
                'body' => 'required',
                'arabic_body' => 'required',
                'seo_title' => 'required',
                'arabic_seo_title' => 'required',
                'seo_description' => 'required',
                'arabic_seo_description' => 'required'
            ]);

            $about = new About;

            $about->setTranslation('body', 'en', $request->body);
            $about->setTranslation('body', 'ar', $request->arabic_body);

            $about->setTranslation('small_detail', 'en', $request->small_detail);
            $about->setTranslation('small_detail', 'ar', $request->arabic_small_detail);

            $about->save();

            /*
            * add the blogs's seo tags
            */
            $seoTags = new Seo;
            $seoTags->setTranslation('title', 'en', $request->seo_title);
            $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
            $seoTags->setTranslation('description', 'en', $request->seo_description);
            $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);
            $about->seoTags()->save($seoTags);
        }

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
    public function edit()
    {
        // dd(76);
        $data=About::findOrFail(1);     
        return view('admin.about.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $rules = [
            'small_detail' => 'required',
            'arabic_small_detail' => 'required',            
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

        $about = About::find(1);

        $about->setTranslation('body', 'en', $request->body);
        $about->setTranslation('body', 'ar', $request->arabic_body);

        $about->setTranslation('small_detail', 'en', $request->small_detail);
        $about->setTranslation('small_detail', 'ar', $request->arabic_small_detail);
        $about->save();

        /*
        * update the blog's seo tags
        */

        $seoTags = $about->seoTags;
        $seoTags->setTranslation('title', 'en', $request->seo_title);
        $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
        $seoTags->setTranslation('description', 'en', $request->seo_description);
        $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);
        $about->seoTags()->save($seoTags);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
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
