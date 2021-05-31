<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use DataTables;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class BannerController extends Controller
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
         $datas = Banner::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                             ->addColumn('image', function(Banner $data) {
                                return '<div class="dt-img"> <img src="'.$data->image.'"/> </div>';
                             })
                             ->addColumn('status', function(Banner $data) {
                                $class = $data->status == 1 ? 'green' : 'red';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-banners-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-banners-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })

                            ->addColumn('action', function(Banner $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-banners-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                
                                </div>

                                ';
                            })
                            ->rawColumns(['image','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
    	// $datas = Banner::orderBy('id','desc')->get();
    	// dd($datas);
        return view('admin.banner.index');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.banner.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

	   $banner = new Banner;

	   if($request->url){
		$banner->setTranslation('url', 'en', $request->url);
		$banner->setTranslation('url', 'ar', $request->arabic_url);
	   }

	   if ($request->ad) {
		$banner->setTranslation('ad', 'en', $request->ad);
		$banner->setTranslation('ad', 'ar', $request->arabic_ad);

	   }


	   if($request->banner){
			$image = $request->banner;			
			$banner->setTranslation('image', 'en', $image);
		}
		else{
			$banner->setTranslation('image', 'en', 'undefined');
		}
		if($request->arabic_banner){
              $arabicImage =$request->arabic_banner;
              $banner->setTranslation('image', 'ar', $arabicImage);
		}
		else{
			$banner->setTranslation('image', 'ar', 'undefined');
		}

	   $banner->save();
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
		$data=Banner::findOrFail($id);        
        return view('admin.banner.edit',compact('data'));
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

		$banner = Banner::find($request->id);

		if($request->url){
			$banner->setTranslation('url', 'en', $request->url);
			$banner->setTranslation('url', 'ar', $request->arabic_url);
		   }

		   if ($request->ad) {
			$banner->setTranslation('ad', 'en', $request->ad);
			$banner->setTranslation('ad', 'ar', $request->arabic_ad);

		   }


	   if($request->banner != NULL){
			$image = $request->banner;
			$banner->setTranslation('image', 'en', $image);
		}

        if($request->arabic_banner != NULL){
            $arabicImage =$request->arabic_banner;
            $banner->setTranslation('image', 'ar', $arabicImage);
        }

		   $banner->update();
	        $msg = 'Data Updated Successfully.';
            return response()->json($msg);
	}

    public function status($id1,$id2)
      {
          $data = Banner::findOrFail($id1);
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
