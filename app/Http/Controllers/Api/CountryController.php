<?php

namespace App\Http\Controllers\Api;

use App\Country;
use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Page;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
class CountryController extends Controller
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
         $datas = Country::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('name', function(Country $data) {
                                return $data->name;
                             })
                             ->addColumn('status', function(Country $data) {
                                $class = $data->status == 1 ? 'green' : 'red';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-country-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-country-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Country $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-country-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                 <a data-href="'.route('admin-country-delete',$data->id).'" class="btn btn-outline delete-data  btn-sm red" data-toggle="confirmation" data-placement="top" data-id="'.$data->id.'" >
                                    <i class="fa fa-trash"></i> Delete </a>
                                
                                </div>

                                ';
                            })
                            ->rawColumns(['action','status'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


    public function index()
    {       
        // return Country::get();
        return view('admin.country.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
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
                   'name' => 'required|unique:countries|max:255',
                    'arabic_name' => 'required',
                    'description' => 'required',
                    'arabic_description' => 'required',
                    ];

            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
              return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }

            $country = new Country;
            $country->image = $request->profilePicture;

            $country->setTranslation('name', 'en', $request->name);
            $country->setTranslation('name', 'ar', $request->arabic_name);

            $country->slug = Str::slug($request->name , '-');
            $country->save();

            // add the page description
            $page = new Page;
            $page->setTranslation('description', 'en', $request->description);
            $page->setTranslation('description', 'ar', $request->arabic_description);
            $country->page()->save($page);
            
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
        $data=Country::findOrFail($id);        
        return view('admin.country.edit',compact('data'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'arabic_name' => 'required',
            'description' => 'required',
            'arabic_description' => 'required',
        ]);

        $country = Country::find($id);
          

        if ($request->profilePicture) {
            $country->image = $request->profilePicture;
        }

        $country->setTranslation('name', 'en', $request->name);
        $country->setTranslation('name', 'ar', $request->arabic_name);

        $country->slug = Str::slug($request->name , '-');
        $country->save();

        //update the page description
        $page = $country->page;
        $page->setTranslation('description', 'en', $request->description);
        $page->setTranslation('description', 'ar', $request->arabic_description);
        $country->page()->save($page);

        $msg = 'Data Updated Successfully.';
        return response()->json($msg); 
    }
     public function status($id1,$id2)
      {
          $data = Country::findOrFail($id1);
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
         $data = Country::findOrFail($id);
         if($data->city->count()>0)
        {
            //--- Redirect Section
            $msg = 'Remove the Related Cities first !';
            return response()->json($msg);
            //--- Redirect Section Ends
        }
        $data->delete();
        return response()->json("Data deleted Successfully !");
    }
}
