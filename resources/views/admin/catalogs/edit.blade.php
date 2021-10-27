 
            <link href="{{ asset('assets/admin_assets/global/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
            <script src="{{ asset('assets/admin_assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>

            <script src="{{ asset('assets/admin_assets/pages/scripts/components-bootstrap-select.min.js')}}" type="text/javascript"></script>

            <link href="{{ asset('assets/admin_assets/gallery/image-uploader.css')}}" rel="stylesheet" type="text/css" />
            <style type="text/css">
                canvas{
                    display: none;
                }
                .d-done{
                      display: none;
                }
            </style>
            

           @include('admin.layouts.modal-scripts')   





            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusformdata" action="{{ route('admin-catalogs-update',$data->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal formcatalog">
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
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="description" class="summernote1 nic" style="width: 100%;" >
                                        {!!$data->description!!}
                                    </textarea>
               
                                </div>                        
                            </div>

                           {{--  <div class="form-group last">
                                <label class="control-label col-md-3">Page Description</label>
                                <div class="col-md-8">
                                      <textarea name="page_description"  class="summernote1 nic" style="width: 100%;" >
                                        {!! $data->page->description !!}
                                      </textarea>
                                </div>
                            </div> --}}


                            <div class="form-group">
                                <label class="col-md-3 control-label" >Start Date</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="date" class="form-control" value="{{$data->start_at }}" name="start_at" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >End Date<span class="sm-span">Leave unchecked for unlimited time</span></label>
                                 <div class="col-md-1 d-inline-flex mt-10">
                                    <input type="checkbox" name="for_unlimited_time" value="1" class="end_date_chk" {{$data->end_at?"checked":""}} >
                                 </div>
                                <div class="col-md-7 d-inline-flex end_date_status {{$data->end_at?"":"not-show"}}"  >
                                    <input type="date" class="form-control" value="{{$data->end_at}}" name="end_at">  
               
                                </div>                        
                            </div>

                            {{-- <div class="form-group">
                                <label class="col-md-3 control-label" >Featured</label>
                                 <div class="col-md-1 d-inline-flex mt-10">
                                    <input type="checkbox" class="featured_chk" {{$data->featured?"checked":""}} value="1" name="featured">
                                 </div>
                                <div class="col-md-7 d-inline-flex featured_status {{$data->featured?"":"not-show"}}">
                                    <input type="date" class="form-control" value="{{$data->featured_expiry_at}}" name="featured_expiry_at">  
               
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
                                    <input type="text" class="form-control"  value="{{$data->getTranslation('name', 'ar')}}" name="arabic_name" required="">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Seo Title</label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->seoTags->getTranslation('title', 'ar')}}"  name="arabic_seo_title" >  
               
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

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Description</label>
                                <div class="col-md-8 d-inline-flex">
                                    <textarea name="arabic_description" class="summernote3 nic" style="width: 100%;">
                                        {!! $data->getTranslation('description', 'ar') !!}
                                    </textarea>
               
                                </div>                        
                            </div>

                           {{--  <div class="row">
                                <div class="col-md-12">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Page Description</label>
                                    <div class="col-md-8">
                                          <textarea name="page_arabic_description"  class="summernote3 nic" style="width: 100%;" >
                                            {!! $data->page->getTranslation('description', 'ar') !!}
                                          </textarea>
                                    </div>
                                </div>

                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label class="col-md-3 control-label" >Start Date<span class="sm-span">In Arabic</span></label>
                                <div class="col-md-8 d-inline-flex">
                                    <input type="text" class="form-control" value="{{$data->getTranslation('start_at', 'ar')}}"  name="arabic_start_at">  
               
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" >End Date<span class="sm-span">In Arabic Leave empty for unlimited time</span></label>
                                <div class="col-md-7 d-inline-flex end_date_status {{$data->end_at?"":"not-show"}}"  >
                                    <input type="text" class="form-control" value="{{$data->getTranslation('end_at', 'ar') }}" name="arabic_end_at">  
               
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
                                      <option data-href="{{ route('admin-branch-load',$store->id) }}"  value="{{ $store->id }}" {{ $store->id == $data->store_id ? 'selected' :'' }}>{{ $store->name }}</option>
                                    @endforeach
                                </select>                             
       
                        </div>                        
                    </div> 

                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Branches</label>
                        <div class="col-md-8">
                                <select class="bs-select form-control" name="branches[]" id="branch" multiple data-actions-box="true" required="">

                                    
                                <?php $arr1=$data->branches->pluck('id')->toArray() ?>
                                @foreach($data->store->branches as $branch)
                                <option value="{{$branch->id}}"  @if(is_array($arr1) &&in_array($branch->id,$arr1)) selected="" @endif >{{$branch->name}}</option>
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
                                      <option data-href="{{ route('admin-city-load',$countr->id) }}" value="{{ $countr->id }}" {{ $data->country_id == $countr->id ? 'selected' :'' }} >{{ $countr->name }}</option>
                                    @endforeach
                                </select>                             
       
                        </div>                        
                    </div> 

                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >City</label>
                        <div class="col-md-8 d-inline-flex">
                                <select class="form-control" id="city"  name="city" required="" >

                                    @foreach($data->city->country->city as $city)
                                      <option value="{{$city->id}}" {{$city->id == $data->city->id ? "selected":""}}>{{$city->name}}</option>
                                    @endforeach
                                </select>                                   
                        </div>                        
                    </div>


                    <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Tags</label>
                        <div class="col-md-8 d-inline-flex">
                                <select class="bs-select form-control"   name="tags[]" multiple="">
                                    <?php $arr=$data->tags->pluck('id')->toArray() ?>

                                    @foreach($tags as $tag)
                                      <option value="{{ $tag->id }}"  @if(is_array($arr) &&in_array($tag->id,$arr)) selected="" @endif >{{ $tag->name }}</option>
                                    @endforeach
                                </select>                             
       
                        </div>                        
                    </div> 
                     <div class="form-group col-md-6">
                        <label class="col-md-3 control-label" >Link</label>
                        <div class="col-md-8 d-inline-flex">
                              <input type="text" class="form-control" value="{{$data->link}}"  name="link">                           
                        </div>                        
                    </div>


                </div>


                <hr>
                <div class="row">
                    <div class="lang-head">
                            <h3>Media</h3>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Add Media Using</label>
                        <div class="col-md-9">
                            <div class="mt-radio-inline">
                                <label class="mt-radio">
                                    <input type="radio" name="addMediaRadios" id="addmediaradio1" value="11" {{$data->attachments?'':'checked'}}> Photos
                                    <span></span>
                                </label>
                                <label class="mt-radio">
                                    <input type="radio" name="addMediaRadios" id="addmediaradio2" value="22" {{$data->attachments?'checked':''}}> Pdf
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="addmedia1 {{$data->attachments?'d-done':''}} ">
                        @if(!$data->attachments)
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Cover Photo *</label>
                                        <div class="col-md-7">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    @php
                                                    $featured_img=$data->images->where('featured',1)->first();
                                                    @endphp
                                                    <img id="profile-photo-preview"  src="{{$featured_img->image?$featured_img->image:'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'}}" alt="" /> </div>
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
                                     <label class="col-md-3 control-label">
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
                                            @foreach($data->images as $image)
                                            @if(!$image->featured)
                                            <div class="uploaded-image gimg">
                                                <img src="{{$image->image?$image->image:'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'}}">
                                                <button class="delete-image"><i class="fa fa-close"></i></button>
                                            </div>
                                            @endif
                                            @endforeach    
                                        </div>
                                        
                                            
                                    </div>

                                </div>
                            </div>
                        @else
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
                                     <label class="col-md-3 control-label">
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
                        @endif

                    </div>
                    <div class="addmedia2 {{$data->attachments?'':'d-done'}}">
                        <div class="col-md-12 mb-20">      
                            <div class="form-group">                 
                                <label class="col-md-3 control-label" >Add PDfs</label>
                                <div class="col-md-8 control-label"  >
                                         <input id='pdf' type='file' name="pdfFile" accept="application/pdf"  />

                                         @if($data->attachments)
                                            <div class="col-md-4 control-label" style="text-align: left;"  >
                                                <a href="{{asset('assets/pdfs/'.$data->attachments)}}" download=""> <i class="fa fa-download mt-5" aria-hidden="true"></i> &nbsp; Download Pdf </a>
                                            </div>
                                        @endif                                    
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

<script type="text/javascript" src="{{asset('assets/admin_assets/gallery/image-uploader.min.js')}}"></script>
 <script>

    $(document).ready(function(){
  
        $('input[type=radio][name=addMediaRadios]').change(function() {
            if (this.value == 11) {
                $('.addmedia1').removeClass('d-done');
                $('.addmedia2').addClass('d-done');
            }else if (this.value == 22) {
                $('.addmedia1').addClass('d-done');
                $('.addmedia2').removeClass('d-done');
            }
        });
  
    });

    $(function () {
         
 
        // for edit
        let preloaded = [];
        {{--let preloaded = [
        @if(!empty($data->attachments) && !is_null($data->attachments))
        @foreach(json_decode($data->attachments) as $key=>$attachment)
            {id: {{$key}}, src: '{{asset('assets/pdfs/'.$attachment)}}'},
        @endforeach
        @endif
        ];--}}
        $(document).ready(function(){ 
            $('.download-file').append('<span class="fa fa-download"> </span>');
            $('.download-file').click(function(e) {
                e.preventDefault();  //stop the browser from following              
                window.location.href = $(this).attr('href');

            });
        });
        // for edit ends

       
        $('.input-images-1').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'attachments',
            preloadedInputName: 'old',
            maxSize: 5 * 1024 * 1024,
            maxFiles: 10,
            extensions: [".pdf"],
            mimes: ["application/pdf"],
        });

    });

</script>
<script type="text/javascript">    
    var convasdata=[];
    PDFJS.disableWorker = true;

    var pdf = document.getElementById('pdf');
    pdf.onchange = function(ev) {
        if (file = document.getElementById('pdf').files[0]) {
            fileReader = new FileReader();
            fileReader.onload = function(ev) {
              // console.log(ev);
              PDFJS.getDocument(fileReader.result).then(function getPdfHelloWorld(pdf) {

                //console.log(pdf.numPages);
                for (var vrt = 1; vrt <= pdf.numPages; vrt++){
                    var canvas=document.createElement("canvas");
                    canvas.setAttribute('id','canvas'+vrt);
                    document.body.appendChild(canvas);

                    var input=document.createElement("input");
                    input.setAttribute('id','input'+vrt);
                    input.setAttribute('name','pdfs[]');
                     input.setAttribute('type','hidden');
                    document.body.appendChild(input);
                    const menu = document.querySelector('.formcatalog');
                    menu.appendChild(input);

                    geturl(pdf,vrt);                
                 }   
                 console.log(convasdata);
              }, function(error){
                console.log(error);
              });
            };
            fileReader.readAsArrayBuffer(file);
        }
    }

    function geturl(pdf,i) {
        // console.log(i);
        pdf.getPage(i).then(function getPageHelloWorld(page) {
          var scale = 1.5;
          var viewport = page.getViewport(scale);
           
          var canvas = document.getElementById('canvas'+i);

          var context = canvas.getContext('2d');
          canvas.height = viewport.height;
          canvas.width = viewport.width;                  
          // Render PDF page into canvas context                 
          var task = page.render({canvasContext: context, viewport: viewport})
          task.promise.then(function(){
            convasdata.push(canvas.toDataURL('image/jpeg'));
            document.getElementById('input'+i).value=canvas.toDataURL('image/jpeg');
          });
        });
    }
  </script>

