@extends('master')
@section('title', '— '.  $store->seoTags->title  )
@section('description', $store->seoTags->description  )

@section('pagelevel_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){

       $(".checkStoresCta").click(function() {
        $('#d-not-found').show();
        $('html,body').animate({
            scrollTop: $("#pointed-area").offset().top},
            'slow');

       })
    });
    </script>
@endsection

@section('content')

    <style>
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
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">


    <a class="top_banner" href="{{$top_banner->url}}">
        <img src="{{$top_banner->image}}" class="d-block w-100" alt="...">
    </a>
    <div class="container">

        @if(session('locale') == 'en')
            <div class="lineBreaker">
                <p>Stores / {{ strtoupper($store->name) }}</p>
            </div>
        @endif

        @if(session('locale') == 'ar')
            <div class="lineBreaker textAlignRight">
                <p>{{ trans('index.stores') }} / {{ strtoupper($store->name) }}</p>
            </div>
        @endif

            @if(session('locale') == 'en')
                <div class="row">
                    <div class="storeLeftSideBar col-sm-3">

                        {{-- <!-- ===================== for screen greater than extra small ======================= --> --}}
                        <div class="d-none d-sm-block storeLogo">
                            <img src="{{$store->image}}" />
                            <a class="btn btn-primary checkStoresCta" href="javascript:;" role="button">{{ trans('index.browse_catalogs') }}</a>
                        </div>
                        {{-- <!-- ===================== for screen greater than extra small end======================= --> --}}

                        {{-- ===================== for extra small screen =======================> --}}
                            <div class="d-block d-sm-none">
                                <img class="extraSmallStoreLogo catalogInfo catalogBoxShadow" src="{{$store->image}}" />
                                <a class="positionRelative fullWidth btn btn-primary checkStoresCta" href="javascript:;" role="button">{{ trans('index.browse_catalogs') }}</a>
                            </div>
                        {{-- ===================== for extra small screen end=======================> --}}

                        {{-- <!-- ===================== for screen greater than extra small ======================= --> --}}
                        @foreach($store_left_sections as $advertisement)

                            @if( $advertisement->image != "undefined")
                                <div class="d-none d-sm-block storeLeftAdvertisement">
                                    <a href="{{$advertisement->url}}" target="_blank">
                                        <img  src="{{$advertisement->image}}" >
                                    </a>
                                </div>
                            @else

                                {!! $advertisement->ad !!}
                            @endif

                        @endforeach
                        {{-- <!-- ===================== for screen greater than extra small end======================= --> --}}

                    </div>

                    <div class="storeContentSection col-sm-6">

                        <h2 class="d-none d-sm-block @if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($store->name) }}</h2>
                        <h2 class="d-block d-sm-none textAlignCenter @if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($store->name) }}</h2>

                        {{-- ===================== for extra small screen =======================> --}}
                        <div class="d-flex d-sm-none storeSocialIcons justify-content-center">
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
                        {{-- ===================== for extra small screen end =======================> --}}


                        {{-- ===================== larger screens =======================> --}}
                        <div class="d-none d-sm-block storeSocialIcons">
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
                        {{-- ===================== larger screens end =======================> --}}


                        <p>
                            {!! $store->page->description !!}
                        </p>

                    </div>

                    {{-- <!-- ===================== for extra smalls screen ======================= --> --}}
                    <div class="d-block d-sm-none col-sm-3">
                        @foreach($store_left_sections as $advertisement)

                            @if( $advertisement->image != "undefined")
                                <div class="storeLeftAdvertisement">
                                    <a href="{{$advertisement->url}}" target="_blank">
                                        <img  src="{{$advertisement->image}}" >
                                    </a>
                                </div>
                            @else

                                {!! $advertisement->ad !!}
                            @endif

                        @endforeach
                    </div>
                    {{-- <!-- ===================== for extra smalls screen end ======================= --> --}}


                    <div class="storeRightSideBar col-sm-3">

                        @foreach($store_right_sections as $advertisement)
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
            @endif

            @if(session('locale') == 'ar')
                <div class="row">
                    <div class="storeRightSideBar col-sm-3">

                        @foreach($store_right_sections as $advertisement)
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
                    <div class="storeContentSection col-sm-6">

                        <h2 class="textAlignRight">{{ strtoupper($store->name) }}</h2>

                        <div class="storeSocialIcons flexEnd margiBottom">
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

                        <div class="richTextBody">
                            <p>
                               {!! $store->page->getTranslation('description', 'ar') !!}
                            </p>
                        </div>


                    </div>
                    <div class="storeLeftSideBar col-sm-3">

                        <div class="storeLogo">
                            <img src="{{$store->image}}" />

                            <a class="btn btn-primary checkStoresCta" href="javascript:;" role="button">{{ trans('index.browse_catalogs') }}</a>

                        </div>

                        @foreach($store_left_sections as $advertisement)

                            @if( $advertisement->image != "undefined")
                                <div class="storeLeftAdvertisement">
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
            @endif

        {{--  ======================= Store branches ==========================  --}}
        @if(count($in_cities) > 0)
            <h2 class="lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.branches_and_information') }}</h2>

            <div class="container storeInCities">
                <div class="accordion " id="accordionExample">
                    @foreach ($in_cities as $city)

                        <div class="card">
                            <div class="card-header" >
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#p__detail{{$city->id}}" aria-expanded="true" aria-controls="p__detail{{$city->id}}">
                                        {{ucfirst($city->name)}}
                                    </button>
                                </h2>
                            </div>
                            
                            <div id="p__detail{{$city->id}}" class="collapse "  data-parent="#accordionExample">
                                @foreach($store->branches as $branch)
                                    @if($branch->city_id == $city->id)                                    
                                            <div class="card-body">
                                                <h5 class="mb-0 @if(session('locale') == 'ar') textAlignRight @endif">

                                                    <p class="content" style="font-size: 15px">

                                                        {{ ucfirst($branch->name) }}

                                                    </p>
                                                </h5>

                                                <div id="{{$branch->slug}}" >
                                                    <div class="card-body">

                                                        <div class="row">
                                                            <div class="col-sm-4 subSection">
                                                                <p class="subHeading @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.address') }}:</p>
                                                                <p class="content @if(session('locale') == 'ar') textAlignRight @endif">
                                                                    {{$branch->address}}
                                                                </p>

                                                                <p class="locationInMap @if(session('locale') == 'ar') textAlignRight @endif">

                                                                    @if(session('locale') == 'en')
                                                                        <span>
                                                                            <i class="fa fa-map-marker">&nbsp;</i>
                                                                        </span>
                                                                    @endif
                                                                    <a href="{{$branch->map_location}}">{{ trans('index.look_at_the_map') }}</a>
                                                                    @if(session('locale') == 'ar')
                                                                        <span>
                                                                        <i class="material-icons">map</i>
                                                                    </span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="col-sm-4 subSection">
                                                                <p class="subHeading @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.phone') }}:</p>
                                                                <p class="content @if(session('locale') == 'ar') textAlignRight @endif">
                                                                    {{$branch->telephone}}
                                                                </p>
                                                            </div>
                                                            <div class="col-sm-4 subSection">
                                                                <p class="subHeading @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.opening_hours') }}:</p>
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
                </div>
            </div>
        @endif

        {{--  ============================ Store branches end==================  --}}





        <!-- advertisements -->
        @foreach($store_long_ad_1 as $advertisement)
            @if(!empty($advertisement))
                <div class="advertisement checkStores noShadow">
                    @if( $advertisement->url != "undefined")

                        <a href="{{$advertisement->url}}">
                            <img src="{{$advertisement->image}}" class="d-block w-100" alt="...">
                        </a>
                    @else
                        {!! $advertisement->ad !!}
                    @endif
                </div>
            @endif
        @endforeach
        <!-- advertisements end -->

        <!-- store catalogs -->
        @include('partials/catalogs/catalogs_of_a_store')
        <!-- store catalogs end-->

        <!-- advertisements -->
        @foreach($store_long_ad_2 as $advertisement)
            @if(!empty($advertisement))
                <div class="advertisement checkStores noShadow">
                    @if( $advertisement->url != "undefined")

                        <a href="{{$advertisement->url}}">
                            <img src="{{$advertisement->image}}" class="d-block w-100" alt="...">
                        </a>
                    @else
                        {!! $advertisement->ad !!}
                    @endif
                </div>
            @endif
        @endforeach
        <!-- advertisements end -->

        <!-- all catalogs end-->
    </div>



@endsection




