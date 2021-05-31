<?php

namespace App\Http\Controllers\Api;

use App\Advertisement;
use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class AdvertisementController extends Controller
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
         $datas = Advertisement::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                             ->addColumn('location', function(Advertisement $data) {
                                if($data->location=="home-long-ad-1"){
                                    return "Home Banner 1";
                                }
                                elseif($data->location=="home-long-ad-2"){ return "Home Banner 2";}
                                elseif($data->location=="home-long-ad-3"){ return "Home Banner 3";}

                                elseif($data->location=="all-catalogs-page-long-ad-1"){ return "Catalog Banner 1";}
                                elseif($data->location=="all-catalogs-page-long-ad-2"){return "Catalog Banner 2";}
                                elseif($data->location=="all-catalogs-page-long-ad-3"){ return "Catalog Banner 3";}

                                elseif($data->location=="all-stores-page-long-ad-1"){ return "Store & Blog Banner 1";}
                                elseif($data->location=="all-stores-page-long-ad-2"){return "Store & Blog Banner 2";}
                                elseif($data->location=="all-stores-page-long-ad-3"){ return "Store & Blog Banner 3";}


                                elseif($data->location=="side-banner1"){ return "Side banner 1";}
                                elseif($data->location=="side-banner2"){ return "Side banner 2";}
                                elseif($data->location=="top-banner"){ return "Top banner";}
                             })
                             ->addColumn('image', function(Advertisement $data) {
                                return '<div class="dt-img"> <img src="'.$data->image.'"/> </div>';
                             })
                             ->addColumn('status', function(Advertisement $data) {
                                $class = $data->status == 1 ? 'green' : 'red';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-advertisements-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-advertisements-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })

                            ->addColumn('action', function(Advertisement $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-advertisements-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                
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
        return view('admin.advertisement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $advertisement = new Advertisement();

        if ($request->url) {
            $advertisement->setTranslation('url', 'en', $request->url);
            $advertisement->setTranslation('url', 'ar', $request->arabic_url);
        }

        if ($request->ad) {
            $advertisement->setTranslation('ad', 'en', $request->ad);
            $advertisement->setTranslation('ad', 'ar', $request->arabic_ad);

        }


        if($request->banner){
            $image = $request->banner;          
            $advertisement->setTranslation('image', 'en', $image);
        }
        else{
            $advertisement->setTranslation('image', 'en', 'undefined');
        }
        if($request->arabic_banner){
              $arabicImage =$request->arabic_banner;
              $advertisement->setTranslation('image', 'ar', $arabicImage);
        }
        else{
            $advertisement->setTranslation('image', 'ar', 'undefined');
        }

        $advertisement->location = $request->location;
        $advertisement->save();
        $msg = 'Data added Successfully.';
        return response()->json($msg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $advertisement = Advertisement::find($id);

        if ($request->url) {
            $advertisement->setTranslation('url', 'en', $request->url);
            $advertisement->setTranslation('url', 'ar', $request->arabic_url);
        }

        if ($request->ad) {
            $advertisement->setTranslation('ad', 'en', $request->ad);
            $advertisement->setTranslation('ad', 'ar', $request->arabic_ad);

        }


       if($request->banner != NULL){
            $image = $request->banner;
            $advertisement->setTranslation('image', 'en', $image);
        }

        if($request->arabic_banner != NULL){
            $arabicImage =$request->arabic_banner;
            $advertisement->setTranslation('image', 'ar', $arabicImage);
        }
        // $advertisement->location = $request->location;
        $advertisement->save();
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Advertisement::findOrFail($id);        
        return view('admin.advertisement.edit',compact('data'));
    }

    public function status($id1,$id2)
      {
          $data = Advertisement::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
