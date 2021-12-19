@extends('master')
@section('image',($stores->count()>0?preg_replace('/\s+/','%20',$stores->first()->image):''))
@section('title', ': Stores')

@section('content')

    <a class="top_banner" href="{{$top_banner->url}}">
        <img src="{{$top_banner->image}}" class="d-block w-100" alt="...">
    </a>
    <div class="container">

        <!-- advertisements -->
        @foreach ($all_stores_page_long_ad_1 as $advertisement)
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

        <!-- all catalogs -->
        <h2 class="lineBreaker"></h2>

        <div class="row">
        @foreach ($stores as $key=>$store)

            @if($key == 12)

                    @foreach ($all_stores_page_long_ad_2 as $advertisement)
                        @if(!empty($advertisement))
                            <div class="advertisement checkStores noShadow">
                                @if( $advertisement->url != "undefined")

                                    <a href="{{$advertisement->url}}">
                                        <img  src="{{$advertisement->image}}" class="d-block w-100" alt="...">
                                    </a>
                                @else
                                    {!! $advertisement->ad !!}
                                @endif
                            </div>
                        @endif
                    @endforeach


                @endif


                <div class="col-6 col-sm-3">
                    <div class=" backgroundStoreContainer">
                        <a href="/store/{{$store->slug}}">
                            <img   class="w-full" src="{{$store->image}}" alt="Sunset in the mountains">
                       </a>
                       <div class=" catalogDetails bgGray">
                           <div class=" storeContainerIndex">
   
                               <div class="textContainer">
                                    <a class="blackColor" href="/{{session('locale')}}/store/{{$store->slug}}">
                                        <p class="alignCenter">
                                            Store {{$store->name}}
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
                @if( $stores->hasPages() )
                <span class="pages">Pages </span> 
                @endif
                {{ $stores->links() }}
            </div>
        </div>

        <!-- advertisements -->
        @foreach ($all_stores_page_long_ad_3 as $advertisement)
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




