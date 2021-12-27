@extends('master')

@section('content')

    <div class="container">
        <!-- all catalogs -->
        <h2 class="lineBreaker">Search results of '{{$searched_item}}'</h2>

        {{--  -----------sorting -----------  --}}
        <div class="row sortingContainer">
            <div class="col-sm-1">
                <a href=""><span class="sortSpan">Sort by</span></a>
            </div>
            <div class="col-sm-11">
                <nav role='navigation'>
                    <ul class="sorting">
                      <li>
                        <a href="/catalogs">
                          <div>
                            All
                          </div>
                        </a>
                      </li>
                     @foreach ($tags as $key=>$tag)
                        <li class="@if( request('tag') == $tag->slug) activeTag  @endif">
                            <a href="/catalogs?tag={{$tag->slug}}">
                                {{$tag->name}}
                            </a>
                      </li>
                     @endforeach
                    </ul>
                </nav>
            </div>
            {{-- <div class="col-sm-2">
                <a href="/catalogs?tag=newest" class="newestSort">
                    <span>Newest</span>
                    <img src="/img/icons/arrow-down-black.svg"/>
                </a>
            </div> --}}
        </div>

        {{--  -----------sorting end -----------  --}}

        <div class="row popularCatalogsContainer">
            @foreach ($catalogs as $key=>$catalog)

                @if($key == 8)
                    <!-- check all stores -->
                    @include('partials/catalogs/check_all_stores')
                    <!-- check all stores end-->
                @endif

                @if($key == 16)
                    <!-- check all stores -->
                    @include('partials/advertisements3')
                    <!-- check all stores end-->
                @endif

                <div class="col-6 col-sm-3 customContainers">
                    <div class="cat-box-s">

                        @if($catalog->featured)
                        <div class="dlz-featured-ribbon"> {{ trans('index.featured')}}</div>
                        @endif
                        @foreach ($catalog->images as $image)
                            @if ($image->featured)
                                <div>
                                    <div class="{{$catalog->expired()?"hovereffect1":'hovereffect'}} ">
                                        <img class="img-responsive" src="{{$image->image}}" alt="">
                                        @if($catalog->expired())
                                            <div class="expired">
                                                <img src="{{ asset('assets/images/expired.png') }}">
                                            </div>
                                        @else
                                        <div class="overlay">
                                           <a class="info" href="/{{session('locale')}}/catalog/{{$catalog->slug}}"> {{ trans('index.view')}}</a>
                                        </div>    
                                        @endif
                                    </div>
                                </div>                          


                            @endif
                        @endforeach
                        <div class="row catalogDetails">
                            <div class="col-sm-12">
                                <p class="catalogName">
                                    <a class="blackColor" href="/{{session('locale')}}/catalog/{{$catalog->slug}}">{{$catalog->name}}</a>
                                </p>

                                <div class="textContainer">
                                    <p class="catalogDate">
                                        {{ \Carbon\Carbon::parse($catalog->start_at)->day }}
                                        @if(!$catalog->end_at)
                                            {{ \Carbon\Carbon::parse($catalog->start_at)->format('F') }}
                                        @endif

                                        @if($catalog->end_at && session('locale') == 'en')
                                            <span> - {{ \Carbon\Carbon::parse($catalog->end_at)->day }}
                                                {{ \Carbon\Carbon::parse($catalog->end_at)->format('F') }}
                                            </span>
                                        @else
                                            {{ $catalog->end_at }}
                                        @endif
                                    </p>
                                    <a class="blackColor" href="/{{session('locale')}}/store/{{$catalog->store->slug}}">
                                        <p>
                                            Store {{$catalog->store->name}}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-12 catalogNavigation">
                @if( $catalogs->hasPages() )
                <span class="pages">Pages </span> 
                @endif
                {{ $catalogs->links() }}
            </div>
        </div>


        <!-- check all stores -->
        @include('partials/browse_catalogs_banner')
        <!-- check all stores end-->

        <!-- all catalogs end-->
    </div>


@endsection




