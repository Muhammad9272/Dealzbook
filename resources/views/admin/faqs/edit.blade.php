            
            @include('admin.layouts.modal-scripts')   
            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusformdata" action="{{ route('admin-faqs-update',$data->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
               {{csrf_field()}}
               @include('includes.admin.form-both')
               <div class="row">
                    <div class="col-md-6">

                        <div class="lang-head">
                            <h3>English</h3>
                        </div>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Question</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->question}}"  name="question" required="">  
               
                                </div>                        
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">Answer</label>
                                <div class="col-md-8">
                                      <textarea name="answer" height="170"  class="summernote2 nic" style="width: 100%;" >
                                        {!! $data->answer !!}
                                      </textarea>
                                </div>
                            </div>



                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="lang-head">
                            <h3>Arabic</h3>
                        </div>
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Question</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  value="{{$data->getTranslation('question', 'ar')}}" name="arabic_question" required="">  
               
                                </div>                        
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">Answer</label>
                                <div class="col-md-8">
                                      <textarea name="arabic_answer" height="170"  class="summernote4 nic" style="width: 100%;" >
                                        {!! $data->getTranslation('answer', 'ar') !!}
                                      </textarea>
                                </div>
                            </div>



                        </div>  
                    </div>

                </div>
                
                   <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn green addProductSubmit-btn">Update</button>
                    </div>                             

            </form>
            <!-- END FORM-->