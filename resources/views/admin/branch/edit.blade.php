            
           @include('admin.layouts.modal-scripts')   
            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusformdata" action="{{ route('admin-branch-update',$data->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
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

                            {{-- <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  value="{{$data->seoTags->title}}" name="seo_title">  
               
                                </div>                        
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="seo_description"  class="nic-simple form-control" style="width: 100%;">
                                        {!! $data->seoTags->description !!}
                                    </textarea>
               
                                </div>                        
                            </div> --}}

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Opening Hours</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->opening_hours}}"  name="opening_hours" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Address</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="address" class="nic-simple form-control" style="width: 100%;" required="">
                                        {!! $data->address !!}
                                    </textarea>
               
                                </div>                        
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Description</label>
                                    <div class="col-md-8">
                                          <textarea name="description"  class="summernote1 nic" style="width: 100%;" >
                                            @if($data->page)
                                             {!! $data->page->description !!}
                                             @endif
                                          </textarea>
                                    </div>
                                </div>

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
                                    <input type="text" class="form-control" value="{{$data->getTranslation('name', 'ar')}}"  name="arabic_name" required="" >  
               
                                </div>                        
                            </div>

                            {{-- <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->seoTags->getTranslation('title', 'ar')}}" name="arabic_seo_title" >  
               
                                </div>                        
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="arabic_seo_description" class="nic-simple form-control" style="width: 100%;">
                                        {!! $data->seoTags->getTranslation('description', 'ar') !!}
                                    </textarea>
               
                                </div>                        
                            </div> --}}

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Opening Hours</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control"  name="arabic_opening_hours" required="" value="{{$data->getTranslation('opening_hours', 'ar')}}">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Address</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="arabic_address" class="nic-simple form-control" style="width: 100%;" required="">
                                       
                                        {!! $data->getTranslation('address', 'ar') !!}
                                       
                                    </textarea>
               
                                </div>                        
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Description</label>
                                    <div class="col-md-8">
                                          <textarea name="arabic_description"  class="summernote3 nic" style="width: 100%;" >
                                            @if($data->page)
                                            {!! $data->page->getTranslation('description', 'ar') !!}
                                            @endif

                                          </textarea>
                                    </div>
                                </div>

                                </div>
                            </div> --}}
                           
                        </div>  

  
                    </div>
                </div>
               <hr>
                <div class="row">
                    <div class="lang-head">
                            <h3>Common Data</h3>
                    </div>
                    <div class="form-group col-md-6">
                                <label class="col-md-3 control-label" >Map</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->map_location}}" name="map_location" >  
               
                                </div>                        
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Store</label>
                        <div class="col-md-8 d-inline-flex">
                                <select class="form-control"   name="store" required="">
                                  <option value="" selected="" disabled="">{{ __("Select Store") }}</option>
                                    @foreach($stores as $store)
                                      <option value="{{ $store->id }}" {{ $store->id == $data->store_id ? 'selected' :'' }} >{{ $store->name }}</option>
                                    @endforeach
                                </select>                             
       
                        </div>                        
                    </div> 
                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Country</label>
                        <div class="col-md-8 d-inline-flex">
                                <select class="form-control" id="country_ch"  name="country" required="">
                                  <option value="" selected="" disabled="">{{ __("Select Country") }}</option>
                                    @foreach($countries as $countr)
                                      <option data-href="{{ route('admin-city-load',$countr->id) }}" value="{{ $countr->id }}" {{ $data->country_id == $countr->id ? 'selected' :'' }}>{{ $countr->name }}</option>
                                    @endforeach
                                </select>                             
       
                        </div>                        
                    </div> 



                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >City</label>
                        <div class="col-md-8 d-inline-flex">
                                <select class="form-control" id="city"  name="city" required="" >
                                    <option value="">{{ __('Select  City') }}</option>
                                    @foreach($data->city->country->city as $city)
                                      <option value="{{$city->id}}" {{$city->id == $data->city->id ? "selected":""}}>{{$city->name}}</option>
                                    @endforeach
                                 
                                </select>                             
       
                        </div>                        
                    </div>

                    <div class="form-group col-md-6">
                                <label class="col-md-3 control-label" >Phone</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->telephone}}"  name="telephone">  
               
                                </div>                        
                    </div> 
                    <div class="form-group col-md-6">
                                <label class="col-md-3 control-label" >Eamil</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->email}}"  name="email" required="">  
               
                                </div>                        
                    </div> 
                </div>


                
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn green addProductSubmit-btn">Update</button>
                </div>                             

            </form>
            <!-- END FORM-->