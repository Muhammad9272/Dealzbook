@extends('master')

@section('title', ': ' . optional($page_description)->seo_title)
@section('description', optional($page_description)->seo_description  )

@section('content')

    <!-- search only for extra small -->
    <div class="d-block d-sm-none mobileSearchSection searchContainer marginBottom searchOnSmallerScreen">
        @include('partials/search')
    </div>
    <!-- search only for extra small end-->

    <!-- banner -->
    @include('partials/banner')
    <!-- banner end -->

    <div class="container mx-auto">



        <!-- logos -->
        @include('partials/logos')
        <!-- logos end -->

        <!-- search for screen greater than extra small -->
        <div class="searchContainer d-none d-sm-block">
            @include('partials/search')
        </div>
        <!-- search for screen greater than extra small end-->

        <!-- advertisements -->
        @foreach($home_long_ad_1 as $advertisement)
            @if(!empty($advertisement))
                <div class="row">
                    <div class="col-sm-12 advertisement">
                        @if( $advertisement->url != "undefined")

                            <a href="{{$advertisement->url}}">
                                <img src="{{$advertisement->image}}" class="d-block w-100" alt="...">
                            </a>
                        @else
                            {!! $advertisement->ad !!}
                        @endif
                    </div>
                </div>
            @endif
        @endforeach

        <!-- advertisements end -->

        <!-- featured catalogs -->
        {{--  @include('partials/catalogs/featured')  --}}
        <!-- featured catalogs end-->

        <!-- latest catalogs -->
        <h2 class="d-none d-sm-block text-3xl mt-8 mb-40 @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.the_latest_catalogs') }}</h2>
        <h2 class="d-block d-sm-none textAlignCenter text-3xl mt-8 mb-40 textAlignCenter @if(session('locale') == 'ar')  @endif">{{ trans('index.the_latest_catalogs') }}</h2>
        @include('partials/catalogs/latest')
        <!-- latest catalogs end-->

        <!-- advertisements -->
        @foreach($home_long_ad_2 as $advertisement)
            @if(!empty($advertisement))
                <div class="row">
                    <div class="col-sm-12 advertisement">
                        @if( $advertisement->url != "undefined")

                            <a href="{{$advertisement->url}}">
                                <img src="{{$advertisement->image}}" class="d-block w-100" alt="...">
                            </a>
                        @else
                            {!! $advertisement->ad !!}
                        @endif
                    </div>
                </div>
            @endif
        @endforeach

        <h2 class="d-none d-sm-block @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.the_latest_coupons') }}</h2>
        <h2 class="d-block d-sm-none textAlignCenter @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.the_latest_coupons') }}</h2>
        <!-- popular catalogs -->
        @include('partials/coupons/latest')
        <!-- popular catalogs end-->

        <!-- advertisements -->
        @foreach($home_long_ad_3 as $advertisement)
            @if(!empty($advertisement))
                <div class="row">
                    <div class="col-sm-12 advertisement">
                        @if( $advertisement->url != "undefined")

                            <a href="{{$advertisement->url}}">
                                <img src="{{$advertisement->image}}" class="d-block w-100" alt="...">
                            </a>
                        @else
                            {!! $advertisement->ad !!}
                        @endif
                    </div>
                </div>
            @endif
        @endforeach


        <!-- latest blog -->
        @include('partials/latest_blog')
        <!-- latest blog end -->

        <!-- about -->
        @include('partials/about')
        <!-- about end-->

    </div>

@endsection
