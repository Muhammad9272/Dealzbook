<?php

namespace App\Http\Controllers\Api;

use App\Social;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
class SocialController extends Controller
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
        return Social::get();
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

        $validatedData = $request->validate([
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
        ]);


        $Social = new Social;

        $Social->facebook = $request->facebook;
        $Social->twitter = $request->twitter;
        $Social->instagram = $request->instagram;
        $Social->youtube = $request->youtube;

        $Social->save();

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
        $data=Social::firstOrFail();
        return view('admin.social.index',compact('data'));
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

          //--- Validation Section
        $rules = [
                'facebook' => 'required',
                'twitter' => 'required',
                'instagram' => 'required',
                'youtube' => 'required',
                'linkedin' => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        $Social=Social::firstOrFail();
        $Social->facebook = $request->facebook;
        $Social->twitter = $request->twitter;
        $Social->instagram = $request->instagram;
        $Social->youtube = $request->youtube;
        $Social->linkedin = $request->linkedin;
        

        $Social->f_status = $request->f_status;
        $Social->i_status = $request->i_status;
        $Social->t_status = $request->t_status;
        $Social->y_status = $request->y_status;
        $Social->l_status = $request->l_status;

        $Social->update();
        $msg = 'Data Updated Successfully.';
        return response()->json($msg); 
    }


}
