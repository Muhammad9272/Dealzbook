<?php

namespace App\Http\Controllers\Api;

use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use DataTables;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class FaqController extends Controller
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
         $datas = Faq::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                             ->editColumn('question', function(Faq $data) {
                                return $data->question;
                             })
                             ->addColumn('status', function(Faq $data) {
                                $class = $data->status == 1 ? 'green' : 'red';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="btn btn-circle btn-sm process  select droplinks '.$class.'"><option data-val="1" value="'. route('admin-faqs-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-faqs-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })

                            ->addColumn('action', function(Faq $data) {
                                return '<div class="action-list">
                                <a data-href="' . route('admin-faqs-edit',$data->id) . '"  data-toggle="modal" data-target="#modal1"  class="btn btn-outline btn-sm blue edit"> <i class="fa fa-edit"></i>Edit</a>
                                
                                </div>

                                ';
                            })
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('admin.faqs.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
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
                   'question' => 'required',
                    'arabic_question' => 'required',
                    'answer' => 'required',
                    'arabic_answer' => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $faq = new Faq;

        $faq->setTranslation('question', 'en', $request->question);
        $faq->setTranslation('question', 'ar', $request->arabic_question);

        $faq->setTranslation('answer', 'en', $request->answer);
        $faq->setTranslation('answer', 'ar', $request->arabic_answer);

        $faq->save();
        $msg = 'Data Added Successfully.';
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
         $data=Faq::findOrFail($id);        
        return view('admin.faqs.edit',compact('data'));
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
                   'question' => 'required',
                    'arabic_question' => 'required',
                    'answer' => 'required',
                    'arabic_answer' => 'required',
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $faq = Faq::find($id);
        $faq->setTranslation('question', 'en', $request->question);
        $faq->setTranslation('question', 'ar', $request->arabic_question);

        $faq->setTranslation('answer', 'en', $request->answer);
        $faq->setTranslation('answer', 'ar', $request->arabic_answer);

        $faq->update();
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        
    }

     /**
     * Toggle the faq status
     */
    public function status($id1,$id2)
      {
          $data = Faq::findOrFail($id1);
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
