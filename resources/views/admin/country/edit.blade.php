            

            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusformdata11" action="{{ route('admin-country-update',$data->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                                    <input type="text" class="form-control" value="{{$data->name}}"  name="name" required="">  
               
                                </div>                        
                            </div>

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

                            <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Detail</label>
                                    <div class="col-md-8">
                                          <textarea name="description" class="nic-simple form-control" style="width: 100%;">
                                            {!! $data->page->description !!}
                                          </textarea>
                                    </div>
                                </div>

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
                            <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Detail</label>
                                    <div class="col-md-8">
                                          <textarea name="arabic_description" class="nic-simple form-control" style="width: 100%;">
                                            {!! $data->page->getTranslation('description', 'ar') !!}
                                          </textarea>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>  
                    </div>

                </div>
                
                   <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn green addProductSubmit-btn">Save changes</button>
                    </div>                             

            </form>
            <!-- END FORM-->