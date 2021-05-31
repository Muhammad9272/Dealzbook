@extends('admin.layouts.app')

@section('page_content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                   <i class="fa fa-plus"></i>                       
                </a>
                <span class="caption-subject font-red-sunglo bold uppercase">About</span>
                
               
            </div>

        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form id="geniusform" action="{{route('admin-about-update')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
               @include('includes.admin.form-both')
            
                <div class="form-body">


                    <div class="row">
                        <div class="col-md-12">

                        <div class="form-group last">
                            <label class="control-label col-md-3">Small Detail</label>
                            <div class="col-md-8">
                                  <textarea name="small_detail" class="nic-simple form-control" style="width: 100%;">
                                    {!! $data->small_detail !!}
                                  </textarea>
                            </div>
                        </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">

                        <div class="form-group last">
                            <label class="control-label col-md-3">Detail</label>
                            <div class="col-md-8">
                                  <textarea name="body" class="pg_summernote1" style="width: 100%;">
                                    {!! $data->body !!}
                                  </textarea>
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" >Seo Title</label>
                        <div class="col-md-8 d-inline-flex">
                            <input type="text" class="form-control" value="{{$data->seoTags->title}}" name="seo_title" required="">  
       
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" >Seo Description</label>
                        <div class="col-md-8 d-inline-flex">
                            <textarea class="form-control" name="seo_description">
                                {!!$data->seoTags->description!!}
                            </textarea>
       
                        </div>                        
                    </div>

                     
                    <hr>
                        <div class="lang-head">
                            <h3>Arabic</h3>
                        </div>


                    <div class="row">
                        <div class="col-md-12">

                        <div class="form-group last">
                            <label class="control-label col-md-3">Small Detail</label>
                            <div class="col-md-8">
                                  <textarea name="arabic_small_detail" class="nic-simple form-control" style="width: 100%;">
                                    {!! $data->getTranslation('small_detail', 'ar') !!}
                                  </textarea>
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                        <div class="form-group last">
                            <label class="control-label col-md-3">Detail</label>
                            <div class="col-md-8">
                                  <textarea name="arabic_body" class="pg_summernote2" style="width: 100%;">
                                    {!! $data->getTranslation('body', 'ar') !!}
                                  </textarea>
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" >Seo Title</label>
                        <div class="col-md-8 d-inline-flex">
                            <input type="text" class="form-control" value="{{$data->seoTags->getTranslation('title', 'ar')}}" name="arabic_seo_title" required="">  
       
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" >Seo Description</label>
                        <div class="col-md-8 d-inline-flex">
                            <textarea class="form-control" name="arabic_seo_description">
                                {!! $data->seoTags->getTranslation('description', 'ar') !!}
                            </textarea>
       
                        </div>                        
                    </div>


                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-4">
                            <button type="submit" class="btn green addProductSubmit-btn">Update</button>
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>

        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->

@endsection
@section('pagelevel_scripts')
<script src="{{ asset('assets/admin_assets/img_upload/imgUpload.js') }}" type="text/javascript"></script>

@endsection