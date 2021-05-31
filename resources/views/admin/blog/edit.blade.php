            
            @include('admin.layouts.modal-scripts')   
            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusformdata" action="{{ route('admin-blogs-update',$data->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
               {{csrf_field()}}
               @include('includes.admin.form-both')
               <div class="row">
                    <div class="col-md-6">

                        <div class="lang-head">
                            <h3>English</h3>
                        </div>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Blog Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->title}}"  name="title" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->seoTags->title}}" name="seo_title">  
               
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
                                <label class="control-label col-md-3">Small Detail</label>
                                <div class="col-md-8">
                                      <textarea name="small_detail" class="nic-simple form-control" style="width: 100%;">
                                        {!! $data->small_detail !!}
                                      </textarea>
                                </div>
                            </div>

                            <div class="form-group last">
                                <label class="control-label col-md-3">Blog Description</label>
                                <div class="col-md-8">
                                      <textarea name="body" height="200"  class="summernote2 nic" style="width: 100%;" >
                                         {!! $data->body !!}
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
                                <label class="col-md-3 control-label" >Blog Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  value="{{$data->getTranslation('title', 'ar')}}" name="arabic_title" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->seoTags->getTranslation('title', 'ar')}}"  name="arabic_seo_title">  
               
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
                                <label class="control-label col-md-3">Small Detail</label>
                                <div class="col-md-8">
                                      <textarea name="arabic_small_detail" class="nic-simple form-control" style="width: 100%;">
                                        {!! $data->getTranslation('small_detail', 'ar') !!}
                                      </textarea>
                                </div>
                            </div>

                            <div class="form-group last">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-8">
                                      <textarea name="arabic_body" height="200" class="summernote4 nic" style="width: 100%;" required="">
                                        {!! $data->getTranslation('body', 'ar') !!}
                                      </textarea>
                                </div>
                            </div>



                        </div>  
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="lang-head">
                        <h3>Media</h3>
                    </div>                   
                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Logo *</label>
                                <div class="col-md-7">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img id="profile-photo-preview"  src="{{$data->image?$data->image:'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'}}" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                            <span class="btn default btn-file" onclick="filemanager.selectFile('profile-photo')">
                                                <span class="fileinput-new" > Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input id="profile-photo" type="text" name="profilePicture" > 
                                            </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
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