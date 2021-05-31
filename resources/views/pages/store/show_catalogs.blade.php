@extends('master')

@section('content')

    <div class="container">
        <!-- all catalogs -->
        <h2 class="lineBreaker">Store {{$store->name}}</h2>

        {{--  -----------sorting -----------  --}}


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

                <div class="col-sm-3 customContainers">
                    <div class="cat-box-s">

                        @foreach ($catalog->images as $image)

                            @if ($image->featured)
                                <a href="/{{session('locale')}}/catalog/{{$catalog->slug}}">
                                     <img class="w-full" src="{{$image->image}}" alt="Sunset in the mountains">
                                </a>
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
                                            {{ \Carbon\Carbon::parse($catalog->start_at)->subMonth()->format('F') }}
                                        @endif

                                        @if($catalog->end_at && session('locale') == 'en')
                                            <span> - {{ \Carbon\Carbon::parse($catalog->end_at)->day }}
                                                {{ \Carbon\Carbon::parse($catalog->end_at)->subMonth()->format('F') }}
                                            </span>
                                        @else
                                            {{ $catalog->end_at }}
                                        @endif
                                    </p>
                                    {{-- <a class="blackColor" href="/{{session('locale')}}/store/{{$catalog->store->slug}}">
                                        <p>
                                            Store {{$catalog->store->name}}
                                        </p>
                                    </a> --}}
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
        {{-- @include('partials/browse_catalogs_banner') --}}
        <!-- check all stores end-->

        <!-- all catalogs end-->
    </div>


@endsection




