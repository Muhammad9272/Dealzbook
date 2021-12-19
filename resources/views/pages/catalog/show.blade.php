@extends('master')
@section('title', '— '.  $catalog->seoTags->title  )
@section('description', $catalog->seoTags->description  )
@section('image',(isset($catalog)?preg_replace('/\s+/','%20',$catalog->images()->where('featured',1)->first()->image):''))
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
      <p>{{ trans('index.catalogs') }} / {{ strtoupper($store->name) }} / {{ strtoupper($catalog->name) }}</p>

   </div>
   {{--        ================================== catalog has image =========================--}}
   @if(count($catalog->images) && count($catalog->pdfs) == 0)
   <script src="{{ mix('js/app.js') }}" defer></script>
   <div class="catalogParentDiv">
      <div class="row catalogHeaderOne">
         <div class="storeLeftSideBar col-sm-6">
            <div class="storeLogo">
               
               <h2 class="@if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($catalog->name) }}</h2>


            </div>
         </div>
         <div class="storeContentSection col-sm-6 catalogHeaderTwo">
            <div class="storeSocialIcons">
               @if($store->facebook_link)
               <a href="{{ $store->facebook_link }}" target="_blank">
               <img src="/img/icons/share-icon-facebook.svg">
               </a>
               @endif
               @if($store->twitter_link)
               <a href="{{ $store->twitter_link }}" target="_blank">
               <img src="/img/icons/share-icon-twitter.svg">
               </a>
               @endif
               @if($store->instagram_link)
               <a href="{{ $store->instagram_link }}" target="_blank">
               <img src="/img/icons/share-icon-instagram.png">
               </a>
               @endif
               @if($store->youtube_link)
               <a href="{{ $store->youtube_link }}" target="_blank">
               <img src="/img/icons/share-icon-youtube.png">
               </a>
               @endif
               @if($store->website_link)
               <a href="{{ $store->website_link }}" target="_blank">
               <img src="/img/icons/share-icon-website.png">
               </a>
               @endif
            </div>
         </div>
      </div>
      <div class="row catalogContainer">
         <div class="storeLeftSideBar col-sm-6">
            {{-- <div class="catalogInfo">
               <div class="row">
                  <div class="col-6 col-sm-8">
                     <p class="fontMada">
                        <a href="/{{session('locale')}}/store/{{$store->slug}}">
                           {{ $store->name }}
                        </a>
                     </p>
                  </div>
                  <div class="col-6 col-sm-4">
                     <p class="fontMada">
                        {{ count($catalog->images) }}
                     </p>
                     <span class="darkGray fontMada">Pages</span>
                  </div>
               </div>
               <div class="row">
                  <div class="col-6 col-sm-4">
                     <p class="catalogDate fontMada">
                        {{ \Carbon\Carbon::parse($catalog->created_at)->day }}
                        {{ \Carbon\Carbon::parse($catalog->created_at)->subMonth()->format('F') }}
                        {{ \Carbon\Carbon::parse($catalog->created_at)->subYear()->format('Y') }}
                     </p>
                     <p class="darkGray fontMada">
                        Added On
                     </p>
                  </div>
                  <div class="col-6 col-sm-4">
                     <p class="catalogDate fontMada">
                        @if(session('locale') == 'en')
                        {{ \Carbon\Carbon::parse($catalog->start_at)->day }}
                        {{ \Carbon\Carbon::parse($catalog->start_at)->subMonth()->format('F') }}
                        {{ \Carbon\Carbon::parse($catalog->start_at)->subYear()->format('Y') }} 
                        @else
                        {{ $catalog->start_at }}
                        @endif
                     </p>
                     <p class="darkGray fontMada">
                        Start Date
                     </p>
                  </div>
                  <div class="col-6 col-sm-4">
                     <p class="catalogDate fontMada">
                        @if ($catalog->end_at && session('locale') == 'en')
                        {{ \Carbon\Carbon::parse($catalog->end_at)->day }}
                        {{ \Carbon\Carbon::parse($catalog->end_at)->subMonth()->format('F') }}
                        {{ \Carbon\Carbon::parse($catalog->end_at)->subYear()->format('Y') }}
                        @else
                        {{ $catalog->end_at }}
                        @endif
                     </p>
                     @if ($catalog->end_at)
                     <p class="darkGray fontMada">
                        End Date
                     </p>
                     @endif
                  </div>
               </div>
               @if( $catalog->link )
               <div class="row">
                  <div class="col-md-12 pdfdv">
                     
                      <li class="pdf-ls" style=""><a href="{{$catalog->link}}"> <i class="fa fa-link mt-5" aria-hidden="true"></i> &nbsp; Visit Catalog </a></li>
                     
                  </div>
               </div>
               @endif

               @if( $catalog->attachments && count(json_decode($catalog->attachments) ))
               <div class="row">
                  <div class="col-md-12 pdfdv">
                      @foreach(json_decode($catalog->attachments) as $key=>$attachment)
                      <li class="pdf-ls" style=""><a href="{{asset('assets/pdfs/'.$attachment)}}" download=""> <i class="fa fa-download mt-5" aria-hidden="true"></i> &nbsp; Download Pdf {{$key>0?$key+1:""}}</a></li>
                      @endforeach
                  </div>
               </div>
               @endif

            </div> --}}
         </div>
         <div class="storeContentSection col-sm-6">
            {!! $catalog->description !!}
         </div>
         
               <div class="row" id="images" >
                  @php $count=0; @endphp
                  @foreach ($catalog_images as $key=>$image)

                     @if ($featured && $count==0)
                        <div class="col-sm-6">
                           <div class="card">
                              <img id="image" class="w-full"
                                 src="{{$featured->image}}"
                                 alt="Sunset in the mountains">
                           </div>
                        </div>
                        @php $count=$count+1; @endphp
                      @elseif(!$image->featured && $key<=9)
                        @if($key==1)
                           <div class="col-sm-6">
                              <div class="row">
                        @endif
                            <div class="col-6 col-sm-4 catalogImages catalogImages-sh " ><img
                              src="{{$image->image}}"
                              alt="Picture 1">
                            </div>
                        @if($loop->last || $key==9)    
                              </div>
                            </div>
                        @endif                      
                      @elseif(!$image->featured)
                        @if($key==10)
                         <div class="row" style="margin-top: 20px;">
                        @endif
                           <div class="col-6 col-sm-2 catalogImages catalogImages-sh">
                               <img
                                 src="{{$image->image}}"
                                 alt="Picture 1">
                           </div>
                        @if($loop->last)   
                         </div>
                        @endif
                      @endif


                  @endforeach
               </div>






      </div>
   </div>
   @endif
   {{--        ================================== catalog has image end =========================--}}
   {{--        ================================== catalog has pdf =========================--}}
   @if(count($catalog->pdfs))
   <div class="catalogParentDiv">
      <div class="row catalogHeaderOne">
         <div class="storeLeftSideBar col-sm-12">
            <div class="storeLogo">
               <h2>{{ strtoupper($catalog->name) }}</h2>
            </div>
         </div>
      </div>
      <div class="row" style="min-height: 600px">
         <div class="col-sm-6">
            @foreach ($catalog->images as $image)
            @if ($image->featured)
            <p class="textCenter" id="container">
               @foreach($catalog->pdfs as $pdf)
               <img id="container" src="{{$image->image}}"  />
               <script type="text/javascript">
                  $(document).ready(function () {
                      var data = '<?php echo $pdf->pdf; ?>';
                      $("#container").flipBook({
                          pdfUrl: 'http://ecatalog.s3-ap-southeast-1.amazonaws.com/' + data,
                          lightBox:true,
                          btnShare : {enabled:false},
                          btnDownloadPages : {enabled:false},
                          btnDownloadPdf : {enabled:false},
                          printMenu: true,
                          downloadMenu: true,
                          btnPrint: {
                              enabled: false,
                          },
                          forceDownload: false
                      });
                  
                  })
               </script>
               <a id="container">Browse catalog</a>
               @endforeach
            </p>
            @endif
            @endforeach
         </div>
         <div class="col-sm-6">
            <div class="row catalogInfo">
               <div class="col-sm-4">
                  <p class="catalogDate">
                     {{ \Carbon\Carbon::parse($catalog->created_at)->day }}
                     {{ \Carbon\Carbon::parse($catalog->created_at)->subMonth()->format('F') }}
                     {{ \Carbon\Carbon::parse($catalog->created_at)->subYear()->format('Y') }}
                  </p>
                  <p class="darkGray fontMada">
                     Added On
                  </p>
               </div>
               <div class="col-sm-4">
                  <p class="catalogDate">
                     @if(session('locale') == 'en')
                     {{ \Carbon\Carbon::parse($catalog->start_at)->day }}
                     {{ \Carbon\Carbon::parse($catalog->start_at)->subMonth()->format('F') }}
                     {{ \Carbon\Carbon::parse($catalog->start_at)->subYear()->format('Y') }} 
                     @else
                     {{ $catalog->start_at }}
                     @endif
                  </p>
                  <p class="darkGray fontMada">
                     Start Date
                  </p>
               </div>
               <div class="col-sm-4">
                  <p class="catalogDate">
                     @if ($catalog->end_at && session('locale') == 'en')
                     {{ \Carbon\Carbon::parse($catalog->end_at)->day }}
                     {{ \Carbon\Carbon::parse($catalog->end_at)->subMonth()->format('F') }}
                     {{ \Carbon\Carbon::parse($catalog->end_at)->subYear()->format('Y') }}
                     @else
                     {{ $catalog->end_at }}
                     @endif
                  </p>
                  @if ($catalog->end_at )
                  <p class="darkGray fontMada">
                     End Date
                  </p>
                  @endif
               </div>
            </div>
            <div class="storeContentSection catalogHeaderTwo">
               <div class="storeSocialIcons">
                  @if($store->facebook_link)
                  <a href="{{ $store->facebook_link }}" target="_blank">
                  <img src="/img/icons/share-icon-facebook.svg">
                  </a>
                  @endif
                  @if($store->twitter_link)
                  <a href="{{ $store->twitter_link }}" target="_blank">
                  <img src="/img/icons/share-icon-twitter.svg">
                  </a>
                  @endif
                  @if($store->instagram_link)
                  <a href="{{ $store->instagram_link }}" target="_blank">
                  <img src="/img/icons/share-icon-instagram.png">
                  </a>
                  @endif
                  @if($store->youtube_link)
                  <a href="{{ $store->youtube_link }}" target="_blank">
                  <img src="/img/icons/share-icon-youtube.png">
                  </a>
                  @endif
                  @if($store->website_link)
                  <a href="{{ $store->website_link }}" target="_blank">
                  <img src="/img/icons/share-icon-website.png">
                  </a>
                  @endif
               </div>
            </div>
            <div class="storeContentSection" style="margin-top: 5%">
               {!! $catalog->description !!}
            </div>
         </div>
      </div>
   </div>
   @endif
   {{--        ================================== catalog has pdf end =========================--}}
   {{-- ================================= advertisement =====================--}}
   <div class="row">
      <div class="col-sm-3">
         @foreach($catalog_small_sections as $advertisement)
         @if( $advertisement->image != "undefined")
         <div class="storeRightAdvertisement">
            <a href="{{$advertisement->url}}" target="_blank">
            <img  src="{{$advertisement->image}}" >
            </a>
         </div>
         @else
         {!! $advertisement->ad !!}
         @endif
         @endforeach
      </div>
      <div class="col-sm-9">
         @foreach($catalog_large_sections as $advertisement)
         @if( $advertisement->image != "undefined")
         <div class="storeRightAdvertisement">
            <a href="{{$advertisement->url}}" target="_blank">
            <img  src="{{$advertisement->image}}" >
            </a>
         </div>
         @else
         {!! $advertisement->ad !!}
         @endif
         @endforeach
      </div>
   </div>
   {{-- ================================= advertisement ends=================--}}
   <!-- advertisements -->
   @foreach($catalog_large_ad_1 as $advertisement)
   @if(!empty($advertisement))
   <div class="advertisement checkStores noShadow">
      @if( $advertisement->url != "undefined")
      <a href="{{$advertisement->url}}">
      <img src="{{$advertisement->image}}"
         class="d-block w-100" alt="...">
      </a>
      @else
      {!! $advertisement->ad !!}
      @endif
   </div>
   @endif
   @endforeach
   <!-- advertisements end -->
   {{--  ======================= Store branches ==========================  --}}
   @if(count($in_cities) > 0)
   <h2 class="lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.branches_and_information') }}</h2>
   <div class="container storeInCities">
      <div class="accordion " id="accordionExample">
         @foreach ($in_cities as $city)
         <div class="card">
            <div class="card-header">
               <h2 class="mb-0 @if(session('locale') == 'ar') textAlignRight @endif">
                  <button class="btn btn-link collapsed " type="button" data-toggle="collapse"
                     data-target="#p__detail{{$city->id}}" aria-expanded="true" aria-controls="p__detail{{$city->id}}">
                  {{ucfirst($city->name)}}
                  </button>
               </h2>
            </div>
            <div id="p__detail{{$city->id}}" class="collapse " data-parent="#accordionExample">
               @foreach($store->branches as $branch)
               @if($branch->city_id == $city->id)                                 
               <div class="card-body">
                  <h5 class="mb-0 @if(session('locale') == 'ar') textAlignRight @endif">
                     <p class="content" style="font-size: 15px">
                        {{ ucfirst($branch->name) }}
                     </p>
                  </h5>
                  <div id="{{$branch->slug}}">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-sm-4 subSection">
                              <p class="subHeading @if(session('locale') == 'ar') textAlignRight @endif">Address:</p>
                              <p class="content @if(session('locale') == 'ar') textAlignRight @endif">
                                 {{$branch->address}}
                              </p>
                              <p class="locationInMap @if(session('locale') == 'ar') textAlignRight @endif">
                                 <span>
                                 <i class="fa fa-map-marker">&nbsp;</i>
                                 </span>
                                 <a href="{{$branch->map_location}}"> Look at the map</a>
                              </p>
                           </div>
                           <div class="col-sm-4 subSection">
                              <p class="subHeading @if(session('locale') == 'ar') textAlignRight @endif">Phone:</p>
                              <p class="content @if(session('locale') == 'ar') textAlignRight @endif">
                                 {{$branch->telephone}}
                              </p>
                           </div>
                           <div class="col-sm-4 subSection">
                              <p class="subHeading @if(session('locale') == 'ar') textAlignRight @endif">Opening hours:</p>
                              <p class="content @if(session('locale') == 'ar') textAlignRight @endif">
                                 {{$branch->opening_hours}}
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endif
               @endforeach
            </div>
         </div>
         @endforeach
         @endif
         {{--  ============================ Store branches end==================  --}}
      </div>
   </div>
   {{--        ========================= tags =========================--}}
   <div class="row container catalogInfo ml-0 tagsst">
      @foreach($catalog->tags as $tag)
      <a href="/catalogs?tag={{$tag->slug}}" class="tag">{{ $tag->name }}</a>
      @endforeach
   </div>
   {{--        ========================= tags end =====================--}}
   <!-- latest catalogs -->
   <h2 class="text-3xl mt-8 @if(session('locale') == 'ar') textAlignRight @endif">
      <a class="nd-link" href="/{{ session('locale') }}/catalogs">{{ trans('index.the_latest_catalogs') }}</a>
   </h2>
   @include('partials/catalogs/latest')
   <!-- latest catalogs end-->
</div>
{{-- ====================================================== arabic version ======================================== --}}
@else
<div class="container">
   <div class="lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">
      <p>{{ trans('index.catalogs') }} / {{ strtoupper($store->name) }} / {{ strtoupper($catalog->name) }}</p>
   </div>
   {{--        ================================== catalog has image =========================--}}
   @if( count($catalog->images) && count($catalog->pdfs) == 0)
   <script src="{{ mix('js/app.js') }}" defer></script>
   <div class="catalogParentDiv">
      <div class="row catalogHeaderOne">
         <div class="storeContentSection col-sm-6 catalogHeaderTwo">
            <div class="storeSocialIcons flexEnd">
               @if($store->facebook_link)
               <a href="{{ $store->facebook_link }}" target="_blank">
               <img src="/img/icons/share-icon-facebook.svg">
               </a>
               @endif
               @if($store->twitter_link)
               <a href="{{ $store->twitter_link }}" target="_blank">
               <img src="/img/icons/share-icon-twitter.svg">
               </a>
               @endif
               @if($store->instagram_link)
               <a href="{{ $store->instagram_link }}" target="_blank">
               <img src="/img/icons/share-icon-instagram.png">
               </a>
               @endif
               @if($store->youtube_link)
               <a href="{{ $store->youtube_link }}" target="_blank">
               <img src="/img/icons/share-icon-youtube.png">
               </a>
               @endif
               @if($store->website_link)
               <a href="{{ $store->website_link }}" target="_blank">
               <img src="/img/icons/share-icon-website.png">
               </a>
               @endif
            </div>
         </div>
         <div class="storeLeftSideBar col-sm-6">
            <div class="storeLogo">
               <h2 class="@if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($catalog->name) }}</h2>
            </div>
         </div>
      </div>
      <div class="row catalogContainer">
         <div class="storeLeftSideBar col-sm-6">
            {{-- <div class="catalogInfo">
               <div class="row">
                  <div class="col-sm-8">
                     <p class="fontMada">
                        {{ $store->name }}
                     </p>
                  </div>
                  <div class="col-sm-4">
                     <p class="fontMada">
                        {{ count($catalog->images) }}
                     </p>
                     <span class="darkGray fontMada">{{ trans('index.pages') }}</span>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-4">
                     <p class="catalogDate fontMada">
                        {{ \Carbon\Carbon::parse($catalog->created_at)->day }}
                        {{ \Carbon\Carbon::parse($catalog->created_at)->subMonth()->format('F') }}
                        {{ \Carbon\Carbon::parse($catalog->created_at)->subYear()->format('Y') }}
                     </p>
                     <p class="darkGray fontMada">
                       {{ trans('index.added_on') }}
                     </p>
                  </div>
                  <div class="col-sm-4">
                     <p class="catalogDate fontMada">
                        @if(session('locale') == 'en')
                        {{ \Carbon\Carbon::parse($catalog->start_at)->day }}
                        {{ \Carbon\Carbon::parse($catalog->start_at)->subMonth()->format('F') }}
                        {{ \Carbon\Carbon::parse($catalog->start_at)->subYear()->format('Y') }} 
                        @else
                        {{ $catalog->start_at }}
                        @endif
                     </p>
                     <p class="darkGray fontMada">
                       {{ trans('index.start_date') }}
                     </p>
                  </div>
                  <div class="col-sm-4">
                     <p class="catalogDate fontMada">
                        @if ($catalog->end_at && session('locale') == 'en')
                        {{ \Carbon\Carbon::parse($catalog->end_at)->day }}
                        {{ \Carbon\Carbon::parse($catalog->end_at)->subMonth()->format('F') }}
                        {{ \Carbon\Carbon::parse($catalog->end_at)->subYear()->format('Y') }}
                        @else
                        {{ $catalog->end_at }}
                        @endif
                     </p>
                     @if ($catalog->end_at)
                     <p class="darkGray fontMada">
                        {{ trans('index.end_date') }}

                     </p>
                     @endif
                  </div>
               </div>
               @if( $catalog->link )
               <div class="row">
                  <div class="col-md-12 pdfdv">
                     
                      <li class="pdf-ls" style=""><a href="{{$catalog->link}}"> <i class="fa fa-link mt-5" aria-hidden="true"></i> &nbsp; Visit Catalog </a></li>
                     
                  </div>
               </div>
               @endif
               @if( $catalog->attachments && count(json_decode($catalog->attachments) ))
               <div class="row">
                  <div class="col-md-12 pdfdv">
                      @foreach(json_decode($catalog->attachments) as $key=>$attachment)
                      <li class="pdf-ls" style=""><a href="{{asset('assets/pdfs/'.$attachment)}}" download=""> <i class="fa fa-download mt-5" aria-hidden="true"></i> &nbsp; Download Pdf {{$key>0?$key+1:""}}</a></li>
                      @endforeach
                  </div>
               </div>
               @endif


            </div> --}}
         </div>
         <div class="storeContentSection col-sm-6">
            {!! $catalog->description !!}
         </div>
         

               <div class="row" id="images" >
                  @php $count=0; @endphp
                  @foreach ($catalog_images as $key=>$image)

                     @if ($featured && $count==0)
                        <div class="col-sm-6">
                           <div class="card">
                              <img id="image" class="w-full"
                                 src="{{$featured->image}}"
                                 alt="Sunset in the mountains">
                           </div>
                        </div>
                        @php $count=$count+1; @endphp
                      @elseif(!$image->featured && $key<=9)
                        @if($key==1)
                           <div class="col-sm-6">
                              <div class="row">
                        @endif
                            <div class="col-6 col-sm-4 catalogImages catalogImages-sh " ><img
                              src="{{$image->image}}"
                              alt="Picture 1">
                            </div>
                        @if($loop->last || $key==9)    
                              </div>
                            </div>
                        @endif                      
                      @elseif(!$image->featured)
                        @if($key==10)
                         <div class="row" style="margin-top: 20px;">
                        @endif
                           <div class="col-6 col-sm-2 catalogImages catalogImages-sh">
                               <img
                                 src="{{$image->image}}"
                                 alt="Picture 1">
                           </div>
                        @if($loop->last)   
                         </div>
                        @endif
                      @endif


                  @endforeach
               </div>


      </div>
   </div>
   @endif
   {{--        ================================== catalog has image end =========================--}}
   {{--        ================================== catalog has pdf =========================--}}
   @if(count($catalog->pdfs))
   <div class="catalogParentDiv">
      <div class="row catalogHeaderOne">
         <div class="storeLeftSideBar col-sm-12">
            <div class="storeLogo textAlignRight">
               <h2>{{ strtoupper($catalog->name) }}</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
            <div class="row catalogInfo">
               <div class="col-sm-4">
                  <p class="catalogDate">
                     {{ \Carbon\Carbon::parse($catalog->created_at)->day }}
                     {{ \Carbon\Carbon::parse($catalog->created_at)->subMonth()->format('F') }}
                     {{ \Carbon\Carbon::parse($catalog->created_at)->subYear()->format('Y') }}
                  </p>
                  <p class="darkGray fontMada">
                     Added On
                  </p>
               </div>
               <div class="col-sm-4">
                  <p class="catalogDate">
                     @if(session('locale') == 'en')
                     {{ \Carbon\Carbon::parse($catalog->start_at)->day }}
                     {{ \Carbon\Carbon::parse($catalog->start_at)->subMonth()->format('F') }}
                     {{ \Carbon\Carbon::parse($catalog->start_at)->subYear()->format('Y') }} 
                     @else
                     {{ $catalog->start_at }}
                     @endif
                  </p>
                  <p class="darkGray fontMada">
                     Start Date
                  </p>
               </div>
               <div class="col-sm-4">
                  <p class="catalogDate">
                     @if ($catalog->end_at && session('locale') == 'en')
                     {{ \Carbon\Carbon::parse($catalog->end_at)->day }}
                     {{ \Carbon\Carbon::parse($catalog->end_at)->subMonth()->format('F') }}
                     {{ \Carbon\Carbon::parse($catalog->end_at)->subYear()->format('Y') }}
                     @else
                     {{ $catalog->end_at }}
                     @endif
                  </p>
                  <p class="darkGray fontMada">
                     End Date
                  </p>
               </div>
            </div>
            <div class="storeContentSection catalogHeaderTwo">
               <div class="storeSocialIcons flexEnd">
                  @if($store->facebook_link)
                  <a href="{{ $store->facebook_link }}" target="_blank">
                  <img src="/img/icons/share-icon-facebook.svg">
                  </a>
                  @endif
                  @if($store->twitter_link)
                  <a href="{{ $store->twitter_link }}" target="_blank">
                  <img src="/img/icons/share-icon-twitter.svg">
                  </a>
                  @endif
                  @if($store->instagram_link)
                  <a href="{{ $store->instagram_link }}" target="_blank">
                  <img src="/img/icons/share-icon-instagram.png">
                  </a>
                  @endif
                  @if($store->youtube_link)
                  <a href="{{ $store->youtube_link }}" target="_blank">
                  <img src="/img/icons/share-icon-youtube.png">
                  </a>
                  @endif
                  @if($store->website_link)
                  <a href="{{ $store->website_link }}" target="_blank">
                  <img src="/img/icons/share-icon-website.png">
                  </a>
                  @endif
               </div>
            </div>
            <div class="storeContentSection" style="margin-top: 5%">
               {!! $catalog->description !!}
            </div>
         </div>
         <div class="col-sm-6">
            @foreach ($catalog->images as $image)
            @if ($image->featured)
            <p class="textCenter" id="container">
               @foreach($catalog->pdfs as $pdf)
               <img id="container" src="{{$image->image}}"  />
               <script type="text/javascript">
                  $(document).ready(function () {
                      var data = '<?php echo $pdf->pdf; ?>';
                      $("#container").flipBook({
                          pdfUrl: 'http://ecatalog.s3-ap-southeast-1.amazonaws.com/' + data,
                          lightBox:true,
                          btnShare : {enabled:false},
                          btnDownloadPages : {enabled:false},
                          btnDownloadPdf : {enabled:false},
                          printMenu: true,
                          downloadMenu: true,
                          btnPrint: {
                              enabled: false,
                          },
                          forceDownload: false,
                      });
                  
                  })
               </script>
               <a id="container">Browse catalog</a>
               @endforeach
            </p>
            @endif
            @endforeach
         </div>
      </div>
   </div>
   @endif
   {{--        ================================== catalog has pdf end =========================--}}
   {{-- ================================= advertisement =====================--}}
   <div class="row">
      <div class="col-sm-9">
         @foreach($catalog_large_sections as $advertisement)
         @if( $advertisement->image != "undefined")
         <div class="storeRightAdvertisement">
            <a href="{{$advertisement->url}}" target="_blank">
            <img  src="{{$advertisement->image}}" >
            </a>
         </div>
         @else
         {!! $advertisement->ad !!}
         @endif
         @endforeach
      </div>
      <div class="col-sm-3">
         @foreach($catalog_small_sections as $advertisement)
         @if( $advertisement->image != "undefined")
         <div class="storeRightAdvertisement">
            <a href="{{$advertisement->url}}" target="_blank">
            <img  src="{{$advertisement->image}}" >
            </a>
         </div>
         @else
         {!! $advertisement->ad !!}
         @endif
         @endforeach
      </div>
   </div>
   {{-- ================================= advertisement ends=================--}}
   <!-- advertisements -->
   @foreach($catalog_large_ad_1 as $advertisement)
   @if(!empty($advertisement))
   <div class="advertisement checkStores noShadow">
      @if( $advertisement->url != "undefined")
      <a href="{{$advertisement->url}}">
      <img src="{{$advertisement->image}}"
         class="d-block w-100" alt="...">
      </a>
      @else
      {!! $advertisement->ad !!}
      @endif
   </div>
   @endif
   @endforeach
   <!-- advertisements end -->
   {{--  ======================= Store branches ==========================  --}}
   @if(count($in_cities) > 0)
   <h2 class="lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.branches_and_information') }}</h2>
   <div class="container storeInCities">
      <div class="accordion " id="accordionExample">
         @foreach ($in_cities as $city)
          <div class="card">
            <div class="card-header">
               <h2 class="mb-0 @if(session('locale') == 'ar') textAlignRight @endif">
                  <button class="btn btn-link collapsed " type="button" data-toggle="collapse"
                     data-target="#p__detail2{{$city->id}}" aria-expanded="true" aria-controls="p__detail2{{$city->id}}">
                  {{ucfirst($city->name)}}
                  </button>
               </h2>
            </div>
            @foreach($store->branches as $branch)
            @if($branch->city_id == $city->id)
            <div id="p__detail2{{$city->id}}" class="collapse " data-parent="#accordionExample">
               <div class="card-body">
                  <h5 class="mb-0 @if(session('locale') == 'ar') textAlignRight @endif">
                     <a href="/{{$store->slug}}/{{$branch->city->slug}}/{{$branch->slug}}">
                     <button class="btn btn-link">
                     {{ ucfirst($branch->name) }}
                     </button>
                     </a>
                  </h5>
                  <div id="{{$branch->slug}}2">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-sm-4 subSection">
                              <p class="subHeading @if(session('locale') == 'ar') textAlignRight @endif">Address:</p>
                              <p class="content @if(session('locale') == 'ar') textAlignRight @endif">
                                 {{$branch->address}}
                              </p>
                              <p class="locationInMap @if(session('locale') == 'ar') textAlignRight @endif">
                                 <span>
                                 <i class="fa fa-map-marker">&nbsp;</i>
                                 </span>
                                 <a href="{{$branch->map_location}}"> Look at the map</a>
                              </p>
                           </div>
                           <div class="col-sm-4 subSection">
                              <p class="subHeading @if(session('locale') == 'ar') textAlignRight @endif">Phone:</p>
                              <p class="content @if(session('locale') == 'ar') textAlignRight @endif">
                                 {{$branch->telephone}}
                              </p>
                           </div>
                           <div class="col-sm-4 subSection">
                              <p class="subHeading @if(session('locale') == 'ar') textAlignRight @endif">Opening hours:</p>
                              <p class="content @if(session('locale') == 'ar') textAlignRight @endif">
                                 {{$branch->opening_hours}}
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
            @endforeach
          </div>
         
         @endforeach
         @endif
         {{--  ============================ Store branches end==================  --}}
      </div>
   </div>
   {{--        ========================= tags =========================--}}
   <div class="row catalogInfo flexEnd ml-0 tagsst">
      @foreach($catalog->tags as $tag)
      <a href="/catalogs?tag={{$tag->slug}}" class="tag">{{ $tag->name }}</a>
      @endforeach
   </div>
   {{--        ========================= tags end =====================--}}
   <!-- latest catalogs -->
   <h2 class="text-3xl mt-8 @if(session('locale') == 'ar') textAlignRight @endif"><a class="nd-link" href="/{{ session('locale') }}/catalogs">{{ trans('index.the_latest_catalogs') }}</a></h2>
   @include('partials/catalogs/latest')
   <!-- latest catalogs end-->
</div>
@endif
@endsection
