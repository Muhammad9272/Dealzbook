<?php

namespace App\Http\Controllers\Api;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Page;
use App\City;
use App\Country;
use App\Store;

use DataTables;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
class BranchController extends Controller
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
         $datas = Branch::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('name', function(Branch $data) {
                                return $data->name;
                             })
                            ->editColumn('store_id', function(Branch $data) {
                                return $data->store->name;
                             })
                            ->editColumn('country_id', function(Branch $data) {
                                return $data->city->country->name;
                             })
                            ->editColumn('city_id', function(Branch $data) {
                                return $data->city->name;
                             })
                            ->addColumn('status', function(Branch $data) {
                                $class = $data->status == 1 ? 'green' : 'red';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-branch-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-branch-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })

                            ->addColumn('action', function(Branch $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-branch-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                
                                </div>

                                ';
                            })
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


    public function index()
    {       
        // return Country::get();
        return view('admin.branch.index');
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
        return view('admin.branch.create',compact('countries','stores'));
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
                'name' => 'required|unique:branches|max:255',
                'arabic_name' => 'required|max:255',
                'opening_hours' => 'required',
                'arabic_opening_hours' => 'required',
                'store' => 'required',
                'city' => 'required',
                'country' => 'required',
                'address' => 'required',
                'arabic_address'=> 'required',
                // 'description' => 'required',
                // 'arabic_description' => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $branch = new Branch();

        //$store->name = Str::of($request->name)->trim();
        $branch->setTranslation('name', 'en', $request->name);
        $branch->setTranslation('name', 'ar', $request->arabic_name);

        $branch->slug = Str::of($request->name)->slug('-');

        $branch->telephone = $request->telephone;
        $branch->fax = $request->fax;
        $branch->email = $request->email;

        $branch->setTranslation('opening_hours', 'en', $request->opening_hours);
        $branch->setTranslation('opening_hours', 'ar', $request->arabic_opening_hours);

        $branch->map_location = $request->map_location;
        $branch->city_id = $request->city;
        $branch->country_id = $request->country;
        $branch->store_id = $request->store;

        if($request->mall){
            $branch->mall_id = $request->mall['id'];
        }


        $branch->setTranslation('address', 'en', $request->address);
        $branch->setTranslation('address', 'ar', $request->arabic_address);

        $branch->save();

        /*
        * associate the seo tags with
        * the store's branch
        */
        $seoTags = new Seo;
        $seoTags->setTranslation('title', 'en', $request->seo_title);
        $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
        $seoTags->setTranslation('description', 'en', $request->seo_description);
        $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);

        $branch->seoTags()->save($seoTags);

        // add the page description
        // $page = new Page;
        // $page->setTranslation('description', 'en', $request->description);
        // $page->setTranslation('description', 'ar', $request->arabic_description);
        // $branch->page()->save($page);

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
         $data=Branch::findOrFail($id);
         $countries=Country::all();
         $stores=Store::where('status',1)->get();
        return view('admin.branch.edit',compact('data','countries','stores'));        
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
                'name' => 'required|max:255',
                'arabic_name' => 'required|max:255',
                'opening_hours' => 'required',
                'arabic_opening_hours' => 'required',
                'store' => 'required',
                'city' => 'required',
                'country' => 'required',
                'address' => 'required',
                'arabic_address'=> 'required',
                // 'description' => 'required',
                // 'arabic_description' => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $branch = Branch::find($id);
        //$store->name = Str::of($request->name)->trim();
        $branch->setTranslation('name', 'en', $request->name);
        $branch->setTranslation('name', 'ar', $request->arabic_name);

        $branch->slug = Str::of($request->name)->slug('-');

        $branch->telephone = $request->telephone;
        $branch->fax = $request->fax;
        $branch->email = $request->email;

        $branch->setTranslation('opening_hours', 'en', $request->opening_hours);
        $branch->setTranslation('opening_hours', 'ar', $request->arabic_opening_hours);

        $branch->map_location = $request->map_location;
        $branch->city_id = $request->city;
        $branch->country_id = $request->country;
        $branch->store_id = $request->store;

        if($request->mall){
            $branch->mall_id = $request->mall['id'];
        }


        $branch->setTranslation('address', 'en', $request->address);
        $branch->setTranslation('address', 'ar', $request->arabic_address);

        $branch->save();

        /*
        * update the store's seo tags
        */
        $seoTags = $branch->seoTags;
        $seoTags->setTranslation('title', 'en', $request->seo_title);
        $seoTags->setTranslation('title', 'ar', $request->arabic_seo_title);
        $seoTags->setTranslation('description', 'en', $request->seo_description);
        $seoTags->setTranslation('description', 'ar', $request->arabic_seo_description);

        $branch->seoTags()->save($seoTags);

        // //update the page description
        // $page = $branch->page;
        // $page->setTranslation('description', 'en', $request->description);
        // $page->setTranslation('description', 'ar', $request->arabic_description);
        // $branch->page()->save($page);
        $msg="Data Updated Successfully!";
        return response()->json($msg);

    }
    /**
     * Toggle the branch status
     */

     public function status($id1,$id2)
      {
          $data = Branch::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }

    public function load($id)
    {
        $cities_m = City::where('country_id',$id)->get();
        return view('admin.load.city',compact('cities_m'));
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
