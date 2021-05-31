            

            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusformdata" action="{{ route('admin-advertisements-store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
               {{csrf_field()}}
               @include('includes.admin.form-both')
               <div class="row">
                    <div class="col-md-6">

                        <div class="lang-head">
                            <h3>English</h3>
                        </div>
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Position</label>
                                <div class="col-md-8 d-inline-flex">
                                        <select class="form-control"  name="location" required="">
                                          <option value="" selected="" disabled="">{{ __("Select Location") }}</option>
                                            
                                              <option value="home-long-ad-1">home-long-ad-1</option>
                                              <option value="home-long-ad-2">home-long-ad-2</option>
                                              <option value="home-long-ad-3">home-long-ad-3</option>
                                              <option value="all-catalogs-page-long-ad-1">all-catalogs-page-long-ad-1</option>
                                              <option value="all-catalogs-page-long-ad-2">all-catalogs-page-long-ad-2</option>
                                              <option value="all-catalogs-page-long-ad-3">all-catalogs-page-long-ad-3</option>
                                           
                                        </select>                             
               
                                </div>                        
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Url</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  name="url" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Banner *</label>
                                <div class="col-md-7">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img id="profile-photo-preview"  src="{{'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'}}" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                            <span class="btn default btn-file" onclick="filemanager.selectFile('profile-photo')">
                                                <span class="fileinput-new" > Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input id="profile-photo" type="text" name="banner" > 
                                            </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>                                   
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Ad</label>
                                    <div class="col-md-8">
                                          <textarea name="ad" class="nic-simple form-control" style="width: 100%;">
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
                                <label class="col-md-3 control-label" >Url</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  name="arabic_url" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Banner *</label>
                                <div class="col-md-7">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img id="profile-photo-preview1"  src="{{'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'}}" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                            <span class="btn default btn-file" id="rto" onclick="filemanager.selectFile('profile-photo23')">
                                                <span class="fileinput-new" > Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input id="profile-photo23" type="text" name="arabic_banner" > 
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
                                          <textarea name="arabic_ad" class="nic-simple form-control" style="width: 100%;">
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
                        <button type="submit" class="btn green addProductSubmit-btn">Save</button>
                    </div>                             

            </form>
            <!-- END FORM-->

            <script type="text/javascript">
                window.addEventListener('filemanager.select', function (e) {
                      var url=$('#profile-photo23').attr('src');
                      $('#profile-photo-preview1').attr('src',url);
                });
            </script>