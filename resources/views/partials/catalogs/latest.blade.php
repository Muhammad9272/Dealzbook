
<div class="row">
    @foreach ($latest_catalogs as $key=>$catalog)

    @if($catalog->ifExistInTheCity())

            <div class="col-6 col-sm-3">
               <div class="cat-box-s">
                    @if($catalog->featured)
                    <div class="dlz-featured-ribbon"> {{ trans('index.featured')}}</div>
                    @endif
                    @foreach ($catalog->images as $image)
                        @if ($image->featured)
                            <div class="clckcatalog">
                                <div class="{{$catalog->expired()?"hovereffect1":'hovereffect'}} ">
                                    <img class="img-responsive" src="{{$image->image}}" alt="">
                                    @if($catalog->expired())
                                        <div class="expired">
                                            <img src="{{ asset('assets/images/expired.png') }}">
                                        </div>
                                        <a class="info" style="display:none;" href="/{{session('locale')}}/catalog/{{$catalog->slug}}"></a>
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
                            <p class="catalogName @if(session('locale') == 'ar') textAlignRight @endif">
                                <a class="blackColor" href="/{{session('locale')}}/catalog/{{$catalog->slug}}">{{$catalog->name}}</a>
                            </p>
                            <div class="textContainer">
                                <p class="catalogDate @if(session('locale') == 'ar') textAlignRight @endif">
                                    @if(session('locale') == 'en') 
                                        {{ \Carbon\Carbon::parse($catalog->start_at)->day }}
                                        @else
                                        {{ $catalog->start_at }}
                                    @endif
                                    @if(!$catalog->end_at && session('locale') == 'en')
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
                                    <p class="@if(session('locale') == 'ar') textAlignRight @endif">
                                    {{ trans('index.store') }} {{$catalog->store->name}}
                                    {{--  <a  href="/store/{{$catalog->store->slug}}" class="no-underline hover:underline text-blue-400">
                                        {{$catalog->store->name}}
                                    </a>  --}}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
               </div>

            </div>
    @endif

    @endforeach

</div>
