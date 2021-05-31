@extends('master')

@section('title', ': Blog')

@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <a class="top_banner" href="{{$top_banner->url}}">
        <img src="{{$top_banner->image}}" class="d-block w-100" alt="...">
    </a>

    <div class="container">

        @if(session('locale') == 'en')
            <div class="row">
                <div class="col-sm-9">

                    @foreach($blogs as $blog)
                        <div>

                            <h2 class="@if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($blog->title) }}</h2>

                            <div>
                                <p>
                                    {!! $blog->small_detail !!}
                                </p>
                            </div>

                            <div class="readMoreBlog">
                                <p><a href="/blog/{{$blog->slug}}">{{ trans('index.read_post') }}</a></p>
                                <a class="arrowIcon" href="/blog/{{$blog->slug}}">
                                    <img src="/img/icons/right-icon.png" />
                                </a>
                            </div>
                            <img src="{{$blog->image}}" />

                        </div>
                    @endforeach

                    <div class="row">
                        <div class="col-sm-12 catalogNavigation">
                            <span class="pages">{{ trans('index.pages') }} </span> {{ $blogs->links() }}
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

        @if(session('locale') == 'ar')
                <div class="row">
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

                        @foreach($blogs as $blog)
                            <div>

                                <h2 class="@if(session('locale') == 'ar') textAlignRight @endif">{{ strtoupper($blog->title) }}</h2>

                                <div class="richTextBody">
                                    <p>
                                         {!! $blog->small_detail !!}
                                    </p>
                                </div>

                                <div class="readMoreBlogArabic">
                                    <a class="arrowIcon" href="/blog/{{$blog->slug}}">
                                        <img src="/img/icons/right-icon.png" />
                                    </a>
                                    <p><a href="/blog/{{$blog->slug}}">{{ trans('index.read_post') }}</a></p>
                                </div>
                                <img src="{{$blog->image}}" />

                            </div>
                        @endforeach

                        <div class="row">
                            <div class="col-sm-12 catalogNavigation justify-content-start">
                                <span class="pages">{{ trans('index.pages') }} </span> {{ $blogs->links() }}
                            </div>
                        </div>

                    </div>
                </div>

            @endif

{{--        ===================== latest blog posts =================--}}
        <h2 class="lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.the_latest_blog_posts') }}</h2>

        <div class="row latestBlogContainer">
            @foreach($latest_blogs as $blog)
                <div class="col-sm-6">
                    <a href="/blog/{{$blog->slug}}">
                        <img src="{{$blog->image}}" />
                    </a>
                    <h3 class="fontMada @if(session('locale') == 'ar') textAlignRight @endif"><a href="/blog/{{$blog->slug}}">{{$blog->title}}</a></h3>
                    <p> {!! $blog->small_detail !!}</p>
                </div>
            @endforeach
        </div>
        {{--        ===================== latest blog posts end =================--}}

        <!-- advertisements -->
            @foreach($all_blogs_page_long_ad_1 as $advertisement)
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
        <h2 class="lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">{{trans('index.the_most_popular_blogs')}}</h2>

        <div class="row popularBlogContainer">
            @foreach($popular_blogs as $blog)
                <div class="col-sm-6">
                    <a href="/blog/{{$blog->slug}}">
                        <img src="{{$blog->image}}" />
                    </a>
                    <h3 class="fontMada @if(session('locale') == 'ar') textAlignRight @endif"><a href="/blog/{{$blog->slug}}">{{$blog->title}}</a></h3>
                    <p> {!! $blog->small_detail !!}</p>
                </div>
            @endforeach
        </div>
        {{--        ===================== popular blog posts end =================--}}

    <!-- advertisements -->
        @foreach($all_blogs_page_long_ad_2 as $advertisement)
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


