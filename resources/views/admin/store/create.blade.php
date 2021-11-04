            
           @include('admin.layouts.modal-scripts')   
            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusformdata" action="{{ route('admin-store-store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                                    <input type="text" class="form-control"  name="name" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Logo *</label>
                                <div class="col-md-7">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img id="profile-photo-preview"  src="{{'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'}}" alt="" /> </div>
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



                            {{-- <div class="row" style="display:none;">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">About Us</label>
                                    <div class="col-md-8">
                                          <textarea name="about" class="nic-simple form-control" style="width: 100%;">
                                          </textarea>
                                    </div>
                                </div>

                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Page Description</label>
                                    <div class="col-md-8">
                                          <textarea name="description" class="summernote1 nic" style="width: 100%;">
                                          </textarea>
                                    </div>
                                </div>

                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  name="seo_title" >  
               
                                </div>                        
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="seo_description" class="nic-simple form-control" style="width: 100%;">
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
                                    <input type="text" class="form-control"  name="arabicName" required="">  
               
                                </div>                        
                            </div>

                            {{-- <div class="row" style="display:none;">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">About Us</label>
                                    <div class="col-md-8">
                                          <textarea name="arabicAbout" class="nic-simple form-control" style="width: 100%;" >
                                            jkjklj
                                          </textarea>
                                    </div>
                                </div>

                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Page Description</label>
                                    <div class="col-md-8">
                                          <textarea name="arabic_description" height="270" class="summernote2 nic" style="width: 100%;">
                                          </textarea>
                                    </div>
                                </div>

                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  name="arabic_seo_title" >  
               
                                </div>                        
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="arabic_seo_description" class="nic-simple form-control" style="width: 100%;">
                                    </textarea>
               
                                </div>                        
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="row">  
                    <div class="lang-head">
                        <h3>Social Links</h3>
                    </div>                  

                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Website Link</label>
                        <div class="col-md-8 d-inline-flex">
                            <input type="text" class="form-control"  name="websiteLink">  
       
                        </div>                        
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Facebook </label>
                        <div class="col-md-8 d-inline-flex">
                            <input type="text" class="form-control"  name="facebookLink">  
       
                        </div>                        
                    </div> 
                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Twitter </label>
                        <div class="col-md-8 d-inline-flex">
                            <input type="text" class="form-control"  name="twitterLink">  
       
                        </div>                        
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Instagram </label>
                        <div class="col-md-8 d-inline-flex">
                            <input type="text" class="form-control"  name="instagramLink" >  
       
                        </div>                        
                    </div> 
                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Youtube </label>
                        <div class="col-md-8 d-inline-flex">
                            <input type="text" class="form-control"  name="youtubeLink">  
       
                        </div>                        
                    </div> 
                   
                </div>
                
                   <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn green addProductSubmit-btn">Save</button>
                    </div>                             

            </form>
            <!-- END FORM-->

            




