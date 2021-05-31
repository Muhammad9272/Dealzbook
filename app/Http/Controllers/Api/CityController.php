<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use DataTables;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class CityController extends Controller
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
         $datas = City::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                             ->editColumn('name', function(City $data) {
                                return $data->name;
                             })
                             ->editColumn('country_id', function(City $data) {
                                return $data->country->name;
                             })
                            ->addColumn('action', function(City $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-city-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                
                                </div>

                                ';
                            })
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('admin.city.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        return view('admin.city.create',compact('countries'));
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
                   'name' => 'required|unique:cities|max:255',
                    'arabic_name' => 'required',
                    'country_id' => 'required',
                    'description' => 'required',
                    'arabic_description' => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        $city = new City();
       
        $city->setTranslation('name', 'en', $request->name);
        $city->setTranslation('name', 'ar', $request->arabic_name);

        $city->slug = Str::slug($request->name , '-');
        $city->country_id = $request->country_id;
        $city->save();

        // add the page description
        $page = new Page; 
        $page->setTranslation('description', 'en', $request->description);
        $page->setTranslation('description', 'ar', $request->arabic_description);
        $city->page()->save($page);
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
        $data=City::findOrFail($id);
        $countries=Country::all();        
        return view('admin.city.edit',compact('data','countries'));
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
                    'arabic_name' => 'required',
                    'country_id' => 'required',
                    'description' => 'required',
                    'arabic_description' => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $city = City::find($id);
        $city->setTranslation('name', 'en', $request->name);
        $city->setTranslation('name', 'ar', $request->arabic_name);
        
        $city->slug = Str::slug($request->name , '-');
        $city->country_id = $request->country_id;
        $city->save();

        //update the page description
        $page = $city->page; 
        $page->setTranslation('description', 'en', $request->description);
        $page->setTranslation('description', 'ar', $request->arabic_description);
        $city->page()->save($page);

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
