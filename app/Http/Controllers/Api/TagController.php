<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Seo;
use Throwable;
use App\Page;

use DataTables;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class TagController extends Controller
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
         $datas = Tag::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                             ->editColumn('name', function(Tag $data) {
                                return $data->name;
                             })
                             ->addColumn('status', function(Tag $data) {
                                $class = $data->status == 1 ? 'green' : 'red';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-tags-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-tags-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })

                            ->addColumn('action', function(Tag $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-tags-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                
                                </div>

                                ';
                            })
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('admin.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'name' => 'required',
            'arabic_name' => 'required',
            'description' => 'required',
            'arabic_description' => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }        

        try {
            
            $slug = Str::slug($request->name , '-');

            $tag = new Tag;

            $tag->setTranslation('name', 'en', $request->name);
            $tag->setTranslation('name', 'ar', $request->arabic_name);
    
            $tag->slug = $slug;
            $tag->save();
    
            /*
            * associate the seo tags with
            * the tag
            */
            $seoTags = new Seo; 
            $seoTags->setTranslation('title', 'en', $request->seo_title);
            $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
            $seoTags->setTranslation('description', 'en', $request->seo_description);
            $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);
            
            $tag->seoTags()->save($seoTags);

            // add the page description
            $page = new Page; 
            $page->setTranslation('description', 'en', $request->description);
            $page->setTranslation('description', 'ar', $request->arabic_description);
            $tag->page()->save($page);
            $msg = 'Data Added Successfully.';
            return response()->json($msg); 

        } catch (Throwable $e) {
            return response()->json(array('errors' => "Data already exists" ));
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
    public function edit($id)
    {
        $data=Tag::findOrFail($id);        
        return view('admin.tags.edit',compact('data'));
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
                   'name' => 'required',
                    'arabic_name' => 'required',
                    'description' => 'required',
                    'arabic_description' => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        try {
            
            $slug = Str::slug($request->name , '-');
            $tag = Tag::find($id);
            $tag->setTranslation('name', 'en', $request->name);
            $tag->setTranslation('name', 'ar', $request->arabic_name);
    
            $tag->slug = $slug;
            $tag->save();
    
            /*
            * associate the seo tags with
            * the tag
            */
            $seoTags = $tag->seoTags;
            $seoTags->setTranslation('title', 'en', $request->seo_title);
            $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
            $seoTags->setTranslation('description', 'en', $request->seo_description);
            $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);
            
            $tag->seoTags()->save($seoTags);

            //update the page description
            $page = $tag->page; 
            $page->setTranslation('description', 'en', $request->description);
            $page->setTranslation('description', 'ar', $request->arabic_description);
            $tag->page()->save($page);

            $msg = 'Data Updated Successfully.';
            return response()->json($msg);

        } catch (Throwable $e) {
            return response()->json(array('errors' => "Data already exists" ));
            
        }

       

    }

    /**
     * Toggle the tag status
     */
    public function status($id1,$id2)
      {
          $data = Tag::findOrFail($id1);
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
        //
    }

}
