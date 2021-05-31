 
            <link href="{{ asset('assets/admin_assets/global/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
            <script src="{{ asset('assets/admin_assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>

            <script src="{{ asset('assets/admin_assets/pages/scripts/components-bootstrap-select.min.js')}}" type="text/javascript"></script>

            <link href="{{ asset('assets/admin_assets/gallery/image-uploader.css')}}" rel="stylesheet" type="text/css" />

           @include('admin.layouts.modal-scripts')   





            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusformdata" action="{{ route('admin-catalogs-store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                                <label class="col-md-3 control-label" >Seo Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  name="seo_title">  
               
                                </div>                        
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="seo_description" class="nic-simple form-control" style="width: 100%;">
                                    </textarea>
               
                                </div>                        
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="description" class="summernote1 nic" style="width: 100%;" >
                                    </textarea>
               
                                </div>                        
                            </div>

                            {{-- <div class="form-group last">
                                <label class="control-label col-md-3">Page Description</label>
                                <div class="col-md-8">
                                      <textarea name="page_description"  class="summernote1 nic" style="width: 100%;" required="">
                                      </textarea>
                                </div>
                            </div> --}}


                            <div class="form-group">
                                <label class="col-md-3 control-label" >Start Date</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="date" class="form-control" name="start_at" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >End Date<span class="sm-span">Leave unchecked for unlimited time</span></label>
                                 <div class="col-md-1 d-inline-flex mt-10">
                                    <input type="checkbox" name="for_unlimited_time" value="1" class="end_date_chk" >
                                 </div>
                                <div class="col-md-7 d-inline-flex end_date_status not-show"  >
                                    <input type="date" class="form-control"  name="end_at">  
               
                                </div>                        
                            </div>

                            {{-- <div class="form-group">
                                <label class="col-md-3 control-label" >Featured</label>
                                 <div class="col-md-1 d-inline-flex mt-10">
                                    <input type="checkbox" class="featured_chk" value="1" name="featured">
                                 </div>
                                <div class="col-md-7 d-inline-flex featured_status not-show">
                                    <input type="date" class="form-control"  name="featured_expiry_at">  
               
                                </div>                        
                            </div> --}}


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
                                    <input type="text" class="form-control"  name="arabic_name" required="">  
               
                                </div>                        
                            </div>

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

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="arabic_description" class="summernote3 nic" style="width: 100%;" >
                                    </textarea>
               
                                </div>                        
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Page Description</label>
                                    <div class="col-md-8">
                                          <textarea name="page_arabic_description"  class="summernote3 nic" style="width: 100%;" required="">
                                          </textarea>
                                    </div>
                                </div>

                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Start Date<span class="sm-span">In Arabic</span></label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  name="arabic_start_at">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >End Date<span class="sm-span">In Arabic Leave empty for unlimited time</span></label>
                                <div class="col-md-7 d-inline-flex end_date_status not-show"  >
                                    <input type="text" class="form-control"  name="arabic_end_at">  
               
                                </div>                        
                            </div>                     
                        </div>  

  
                    </div>
                </div>
               <hr>
                <div class="row">
                    <div class="lang-head">
                            <h3>Common Data</h3>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Store</label>
                        <div class="col-md-8 d-inline-flex">
                                <select class="form-control" id="store_ch"  name="store" required="">
                                  <option value="" selected="" disabled="">{{ __("Select Store") }}</option>
                                    @foreach($stores as $store)
                                      <option data-href="{{ route('admin-branch-load',$store->id) }}"  value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>                             
       
                        </div>                        
                    </div> 

                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Branches</label>
                        <div class="col-md-8">
                                <select class="bs-select form-control" name="branches[]" id="branch" multiple data-actions-box="true" required="">
                                </select>                                   
                        </div>                        
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Country</label>
                        <div class="col-md-8 d-inline-flex">
                                <select class="form-control" id="country_ch"  name="country" required="">
                                  <option value="" selected="" disabled="">{{ __("Select Country") }}</option>
                                    @foreach($countries as $countr)
                                      <option data-href="{{ route('admin-city-load',$countr->id) }}" value="{{ $countr->id }}">{{ $countr->name }}</option>
                                    @endforeach
                                </select>                             
       
                        </div>                        
                    </div> 

                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >City</label>
                        <div class="col-md-8 d-inline-flex">
                                <select class="form-control" id="city"  name="city" required="" disabled="">
                                 
                                </select>                                   
                        </div>                        
                    </div>


                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Tags</label>
                        <div class="col-md-8 d-inline-flex">
                                <select class="bs-select form-control"   name="tags[]" multiple="">
                                    @foreach($tags as $tag)
                                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>                             
       
                        </div>                        
                    </div> 


                </div>
                <hr>
                <div class="row">
                    <div class="lang-head">
                            <h3>Media</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                                <label class="col-md-3 control-label">Cover Photo *</label>
                                <div class="col-md-7">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img id="profile-photo-preview"  src="{{'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'}}" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                            <span class="btn default btn-file" onclick="filemanager.selectFile('profile-photo')">
                                                <span class="fileinput-new" > Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input id="profile-photo" type="text" name="cover_photo" > 
                                            </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12">

                        <div class="form-group image-uploader">
                             <label class="col-md-3 control-label">Cover Photo *
                                <br>
                                <div class="gallery-upl" onclick="filemanager.bulkSelectFile('myBulkSelectCallback')">
                                    <span >
                                        Upload Gallery
                                    </span>
                                    <input type="hidden" name="catalog_images" id="galleryimgval">
                                </div>
                             </label>
                            <div class="col-md-8  "  >
                                <div class="img-box uploaded" id="img-gallery">
                                    <h3> Upload Gallery </h4>
                                </div>                                    
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mb-20">
                        <div class="form-group image-uploader">
                           <label class="col-md-3 control-label" >Add PDfs</label>
                            <div class="col-md-8"  >
                                 <div class="input-images-1" style="padding-top: .5rem;">


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

             <script type="text/javascript" src="{{asset('assets/admin_assets/gallery/image-uploader.min.js')}}"></script>

             <script>

                $(function () {

                    $('.input-images-1').imageUploader({

                        imagesInputName: 'attachments',
                        maxSize: 5 * 1024 * 1024,
                        maxFiles: 10,
                        extensions: [".pdf"],
                        mimes: ["application/pdf"],
                    });
                    
                });

            </script>

