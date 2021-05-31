            
            @include('admin.layouts.modal-scripts')   
            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusformdata" action="{{ route('admin-tags-update',$data->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
               {{csrf_field()}}
               @include('includes.admin.form-both')
               <div class="row">
                    <div class="col-md-6">

                        <div class="lang-head">
                            <h3>English</h3>
                        </div>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Name</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  value="{{$data->name}}"  name="name" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->seoTags->title}}"  name="seo_title">  
               
                                </div>                        
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="seo_description" class="nic-simple form-control" style="width: 100%;">
                                        {!!$data->seoTags->description!!}
                                    </textarea>
               
                                </div>                        
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-8">
                                      <textarea name="description"  class="summernote1 nic" style="width: 100%;" >
                                        {!! $data->page->description !!}
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
                                <label class="col-md-3 control-label" >Name</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->getTranslation('name', 'ar')}}"  name="arabic_name" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->seoTags->getTranslation('title', 'ar')}}" name="arabic_seo_title">  
               
                                </div>                        
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="arabic_seo_description" class="nic-simple form-control" style="width: 100%;">
                                        {!! $data->seoTags->getTranslation('description', 'ar') !!}
                                    </textarea>
               
                                </div>                        
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-8">
                                      <textarea name="arabic_description"  class="summernote3 nic" style="width: 100%;" >
                                        {!! $data->page->getTranslation('description', 'ar') !!}
                                      </textarea>
                                </div>
                            </div>



                        </div>  
                    </div>

                </div>
                
                   <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn green addProductSubmit-btn">Save</button>
                    </div>                             

            </form>
            <!-- END FORM-->