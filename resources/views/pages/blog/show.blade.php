@extends('master')
@section('title', ': '.  $blog->seoTags->title  )
@section('description', $blog->seoTags->description  )

@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <a class="top_banner" href="{{$top_banner->url}}">
        <img src="{{$top_banner->image}}" class="d-block w-100" alt="...">
    </a>

    <div class="container">
        @if(session('locale') == 'en')
            <div class="row">
                <div class="col-sm-9">

                    <div>

                        <h2 class="@if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($blog->title) }}</h2>

                        <p> {!! $blog->small_detail !!}</p>

                        <img src="{{$blog->image}}" />

                        <p>
                            {!! $blog->body !!}
                        </p>


                    </div>

                </div>

                <div class="col-sm-3">

                    @foreach($blog_right_sections as $advertisement)
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
                <div class="d-none d-sm-flex row">
                    <div class="col-sm-3">

                        @foreach($blog_right_sections as $advertisement)
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

                        <div>

                            <h2 class="@if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($blog->title) }}</h2>
                            <p> {!! $blog->small_detail !!}</p>

                            <img src="{{$blog->image}}" />

                            <div class="richTextBody">
                                <p>
                                    {!! $blog->body !!}
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="d-block d-sm-none row">
                    <div class="col-sm-9">

                        <div>

                            <h2 class="@if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($blog->title) }}</h2>

                            <img src="{{$blog->image}}" />

                            <div class="richTextBody">
                                <p>
                                    {!! $blog->body !!}
                                </p>
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-3">

                        @foreach($blog_right_sections as $advertisement)
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

        <!-- advertisements -->
        @foreach($blog_long_ad_1 as $advertisement)
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

        {{--        ===================== popular blog posts =================--}}
        <h2 class="d-none d-sm-block lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">{{trans('index.the_most_popular_catalogs')}}</h2>
        <h2 class="d-block d-sm-none textAlignCenter lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">{{trans('index.the_most_popular_blogs')}}</h2>
        
        <div class="row">
            @foreach($popular_blogs as $blog)
                <div class="col-sm-6 popularBlogContainer">
                    <img src="{{$blog->image}}" />
                    <h3 class="fontMada @if(session('locale') == 'ar') textAlignRight @endif">{{$blog->title}}</h3>
                    <p> {!! $blog->small_detail !!}</p>
                </div>
            @endforeach
        </div>
    {{--        ===================== popular blog posts end =================--}}

    <!-- advertisements -->
        @foreach($blog_long_ad_2 as $advertisement)
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

        <!-- latest catalogs -->
        <h2 class="text-3xl mt-8 @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.the_latest_catalogs') }}</h2>
    @include('partials/catalogs/latest')
    <!-- latest catalogs end-->




    </div>


@endsection


