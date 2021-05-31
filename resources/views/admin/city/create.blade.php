            

            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusformdata" action="{{ route('admin-city-store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                                <label class="col-md-3 control-label" >Country</label>
                                <div class="col-md-8 d-inline-flex">
                                        <select class="form-control"  name="country_id" required="">
                                          <option value="" selected="" disabled="">{{ __("Select Country") }}</option>
                                            @foreach($countries as $countr)
                                              <option value="{{ $countr->id }}">{{ $countr->name }}</option>
                                            @endforeach
                                        </select>                             
               
                                </div>                        
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Detail</label>
                                    <div class="col-md-8">
                                          <textarea name="description" class="nic-simple form-control" style="width: 100%;">
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
                                    <input type="text" class="form-control"  name="arabic_name" required="">  
               
                                </div>                        
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Detail</label>
                                    <div class="col-md-8">
                                          <textarea name="arabic_description" class="nic-simple form-control" style="width: 100%;">
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