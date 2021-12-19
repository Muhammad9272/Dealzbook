@extends('master')

@section('title', '— Coupons')
@section('image',($coupons->count()>0?preg_replace('/\s+/','%20',$coupons->first()->image):''))


@section('content')
    
    <a href="{{$top_banner->url}}">
        <img src="{{$top_banner->image}}" class="d-block w-100" alt="...">
    </a>
    <div class="container">
        <!-- all catalogs -->
        <h2 class="lineBreaker @if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.find_your_favorite_stores_offers_on_dealzbook') }}</h2>

        {{--  -----------sorting for extra small screen-----------  --}}
        <div class="blueBorderBottom d-flex d-sm-none justify-content-space-between">
            <a href=""><span class="sortSpan">{{ trans('index.sort_by') }}</span></a>
            {{-- <a href="/catalogs?tag=newest" class="newestSort">
                <span>{{ trans('index.newest') }}</span>
                <img src="/img/icons/arrow-down-black.svg"/>
            </a> --}}
        </div>
        

        <div class="">
            
                      
               @include('partials.coupons.latest')

        </div>

        <div class="row">
            <div class="col-sm-12 catalogNavigation  @if(session('locale') == 'ar') justify-content-start @endif">
                @if( $coupons->hasPages() )
                <span class="pages">{{ trans('index.pages') }} </span>
                @endif
                 {{ $coupons->links() }}
            </div>
        </div>


        <!-- advertisements -->
        @foreach($all_catalogs_page_long_ad_3 as $advertisement)
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

        <!-- all catalogs end-->
    </div>


@endsection




