@extends('master')
@section('title', '— '.  $coupon->seoTags->title  )
@section('description', $coupon->seoTags->description  )
@section('content')
<script type="text/javascript" src="{{ asset('js/3d-flip-book/js/libs/jquery.min.js') }}"></script>
{{--  <script src="{{ asset('js/3d-flip-book/js/libs/html2canvas.min.js') }}" ></script> 
<script src="{{ asset('js/3d-flip-book/js/libs/three.min.js') }}" defer></script>
<script src="{{ asset('js/3d-flip-book/js/libs/pdf.min.js') }}" defer></script>
<script src="{{ asset('js/3d-flip-book/js/dist/3dflipbook.js') }}" defer></script>  --}}
{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>  --}}
<script src="{{ asset('canyon/js/jquery.js') }}"></script>
<script src="{{ asset('canyon/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('canyon/js/flipbook.min.js') }}"></script>

<link href="{{ asset('css/viewer.css') }}" rel="stylesheet">
<script src="{{ asset('js/viewer.js') }}" defer></script>
{{-- <script type="text/javascript">
   var $image = $('#images');

      $image.viewer({
        inline: true,
        viewed: function() {
          $image.viewer('zoomTo', 1);
        }
      });
</script> --}}

<style>
   .catalogImages {
      align-items:center ;
   }
   .accordion {
   border: 1px solid #002247;
   }
   .accordion h3 {
   background-color: #f3e9eb;
   color: #222;
   font-size: 16px;
   text-align: center;
   margin: 0;
   padding: 10px;
   }
   .accordion .card-header {
   padding: 0;
   }
   .accordion .card-header button {
   text-align: left;
   display: block;
   width: 100%;
   font-size: 18px;
   color: #000000;
   position: relative;
   }
   .accordion .card-header button.collapsed::after {
   position: absolute;
   width: 2px;
   height: 12px;
   content: '';
   background-color: #000;
   right: 12px;
   top: 54%;
   -webkit-transform: translateY(-50%);
   transform: translateY(-50%);
   }
   .accordion .card-header button::before {
   position: absolute;
   width: 12px;
   height: 2px;
   content: '';
   background-color: #000;
   right: 7px;
   top: 50%;
   }
   .accordion .card-header button:hover {
   text-decoration: none;
   }
   .accordion .card-header button i {
   float: right;
   margin-top: 3px;
   }
   .accordion .card-body {
   padding: 15px;
   font-size: 16px;
   }
   .accordion .card-body table {
   margin: 0;
   }
   .accordion .card-body table a {
   color: #000;
   }
   .accordion .card-body table span {
   display: inline-block;
   width: 10px;
   height: 10px;
   border-radius: 50%;
   margin-right: 5px;
   }
   .accordion ul.occasion_list a {
   padding: 5px 15px;
   color: #222;
   font-size: 14px;
   display: inline-block;
   }
   .accordion ul.occasion_list a:hover {
   color: #002247;
   }
   .viewer-canvas img{
      /*height:87% !important;*/
      transform: scale(1.09) !important;
   }
   .viewer-title{
      display: none;
   }

   .viewer-navbar{
      display: none;
   }
   #images img:hover{
      cursor: pointer;
   }
    .viewer-toolbar>ul>.viewer-large{
      width: 40px !important;
      height: 40px !important;
   }
   .viewer-play:before {
    background-position: -95px 4px;
   }
   .viewer-next:before {
    background-position: -115px 4px;
   }
   .viewer-prev:before {
    background-position: -76px 4px;
   }
   .viewer-zoom-out:before {
    background-position: -16px 4px;
   }
   .viewer-zoom-in:before {
    background-position: 4px 4px;
   }

  
   /*.viewer-rotate-left,.viewer-rotate-right,.viewer-flip-horizontal,.viewer-flip-vertical,.viewer-one-to-one{
      display: none!important;
   }*/
  /* .viewer-toolbar>ul>li{
      width: 30px;
      height: 30px;
   }*/
   /*.viewer-toolbar>ul>li::before{
      width: 24px;
      height: 24px;
   }*/
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
{{-- 
<div class="flip-book-container solid-container" src="{{ asset('storage/catalogs/ZwgJYEDP4VLgpoF5oPjWqcUN43FwGAAGEdIPAA12.pdf') }}">
</div>
--}}
 <a class="top_banner" href="{{$top_banner->url}}">
     <img src="{{$top_banner->image}}" class="d-block w-100" alt="...">
 </a>
@if(session('locale') == 'en')

<div class="container">
   <div class="lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">
      <p>{{ trans('index.coupons') }} / {{ strtoupper($coupon->store->name) }} / {{ strtoupper($coupon->name) }}</p>

   </div>
   {{--        ================================== catalog has image =========================--}}

   <script src="{{ mix('js/app.js') }}" defer></script>
   <div class="catalogParentDiv">
      <div class="row catalogHeaderOne">
         <div class="storeLeftSideBar col-sm-6">
            <div class="storeLogo">
               
               <h2 class="@if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($coupon->name) }}</h2>
            </div>
         </div>
         <div class="storeContentSection col-sm-6 catalogHeaderTwo">
            <div class="storeSocialIcons">
               @if($coupon->store->facebook_link)
               <a href="{{ $coupon->store->facebook_link }}" target="_blank">
               <img src="/img/icons/share-icon-facebook.svg">
               </a>
               @endif
               @if($coupon->store->twitter_link)
               <a href="{{ $coupon->store->twitter_link }}" target="_blank">
               <img src="/img/icons/share-icon-twitter.svg">
               </a>
               @endif
               @if($coupon->store->instagram_link)
               <a href="{{ $coupon->store->instagram_link }}" target="_blank">
               <img src="/img/icons/share-icon-instagram.png">
               </a>
               @endif
               @if($coupon->store->youtube_link)
               <a href="{{ $coupon->store->youtube_link }}" target="_blank">
               <img src="/img/icons/share-icon-youtube.png">
               </a>
               @endif
               @if($coupon->store->website_link)
               <a href="{{ $coupon->store->website_link }}" target="_blank">
               <img src="/img/icons/share-icon-website.png">
               </a>
               @endif
            </div>
         </div>
      </div>
      <div class="row catalogHeaderTwo">
         <div class="row">
            <div class="col-md-6">
               <img src="{{$coupon->image}}">
            </div>
             <div class="col-md-6">
                {!! $coupon->description !!}

                 @if($coupon->link)
                  <div class="@if(session('locale') == 'ar') textAlignRight @endif">
                     <h3 class="d-inline-flex">
                        {{ trans('index.coupon_link') }} : <a style="margin:0" href="{{$coupon->link}}">{{trans('index.click_here')}}</a>
                     </h3>
                     
                  </div>
                  @endif
                  @if($coupon->coupon_code)
                  <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                     <div class="ttgg d-inline-flex">
                           <div class="left-tgg">
                                <input  type="text" id="referlink1001" value="{{$coupon->coupon_code}}">
                           </div>
                           <div class="right-tgg">
                               <p class="coupon-btn" onclick="copyreferlink(1001)">{{ trans('index.copy_code') }}</p>
                           </div>
                     </div>                     

                  </div>

                  @endif


             </div>
         </div>
         
      </div>
      
   </div>


   {{--        ========================= tags =========================--}}
   @if($coupon->tags->count()>0 )
   <div class="row container catalogInfo ml-0 tagsst">
      @foreach($coupon->tags as $tag)
      <a href="/catalogs?tag={{$tag->slug}}" class="tag">{{ $tag->name }}</a>
      @endforeach
   </div>
   @endif
   {{--        ========================= tags end =====================--}}
   <!-- latest catalogs -->
   <h2 class="text-3xl mt-8 @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.the_latest_coupons') }}</h2>
   @include('partials/coupons/latest')
   <!-- latest catalogs end-->
</div>
{{-- ====================================================== arabic version ======================================== --}}
@else
<div class="container">
   <div class="lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">
      <p>{{ trans('index.coupons') }} / {{ strtoupper($coupon->store->name) }} / {{ strtoupper($coupon->name) }}</p>
   </div>
   {{--        ================================== catalog has image =========================--}}

   <script src="{{ mix('js/app.js') }}" defer></script>
   <div class="catalogParentDiv">
      <div class="row catalogHeaderOne">
         <div class="storeContentSection col-sm-6 catalogHeaderTwo">
            <div class="storeSocialIcons flexEnd">
               @if($coupon->store->facebook_link)
               <a href="{{ $coupon->store->facebook_link }}" target="_blank">
               <img src="/img/icons/share-icon-facebook.svg">
               </a>
               @endif
               @if($coupon->store->twitter_link)
               <a href="{{ $coupon->store->twitter_link }}" target="_blank">
               <img src="/img/icons/share-icon-twitter.svg">
               </a>
               @endif
               @if($coupon->store->instagram_link)
               <a href="{{ $coupon->store->instagram_link }}" target="_blank">
               <img src="/img/icons/share-icon-instagram.png">
               </a>
               @endif
               @if($coupon->store->youtube_link)
               <a href="{{ $coupon->store->youtube_link }}" target="_blank">
               <img src="/img/icons/share-icon-youtube.png">
               </a>
               @endif
               @if($coupon->store->website_link)
               <a href="{{ $coupon->store->website_link }}" target="_blank">
               <img src="/img/icons/share-icon-website.png">
               </a>
               @endif
            </div>
         </div>
         <div class="storeLeftSideBar col-sm-6">
            <div class="storeLogo">
               <h2 class="@if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($coupon->name) }}</h2>
            </div>
         </div>
      </div>

      <div class="row catalogHeaderTwo">
         <div class="row">
            <div class="col-md-6">
               <img src="{{$coupon->image}}">
            </div>
             <div class="col-md-6">
                {!! $coupon->description !!}

                 @if($coupon->link)
                  <div class="@if(session('locale') == 'ar') textAlignRight @endif">
                     <h3 class="d-inline-flex">
                        <a style="margin:0" href="{{$coupon->link}}">{{trans('index.click_here')}}</a> :
                        {{ trans('index.coupon_link') }} 
                     </h3>
                     
                  </div>
                  @endif
                  @if($coupon->coupon_code)
                  <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6" style="float: right;">
                     <div class="ttgg d-inline-flex">
                           <div class="left-tgg">
                                <input  type="text" id="referlink1001" value="{{$coupon->coupon_code}}">
                           </div>
                           <div class="right-tgg">
                               <p class="coupon-btn" onclick="copyreferlink(1001)">{{ trans('index.copy_code') }}</p>
                           </div>
                     </div>                     

                  </div>

                  @endif


             </div>
         </div>         
      </div>      


      
   </div>
   

   {{--        ========================= tags =========================--}}
   @if($coupon->tags->count()>0)
   <div class="row catalogInfo flexEnd ml-0 tagsst">
      @foreach($coupon->tags as $tag)
      <a href="/catalogs?tag={{$tag->slug}}" class="tag">{{ $tag->name }}</a>
      @endforeach
   </div>
   @endif
   {{--        ========================= tags end =====================--}}
   <!-- latest catalogs -->
   <h2 class="text-3xl mt-8 @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.the_latest_coupons') }}</h2>
   @include('partials/coupons/latest')
   <!-- latest catalogs end-->
</div>
@endif
@endsection
