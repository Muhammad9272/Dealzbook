@if(count($stores))
<div class="container">
    <!--  only for extra small -->
    <div class="d-flex d-sm-none row">
        @foreach ($stores as $store)
        @if ($store->featured)
            <div class="col-6">
                <a href="/store/{{$store->slug}}">
                    <img class="w-full storeLogoForSmallScreen" src="{{$store->image}}" alt="Sunset in the mountains">
                </a>
            </div>
        @endif

    @endforeach
    </div>
    <!--  only for extra small -->

    <!--  only for other than extra small -->
    <div class="d-none d-sm-block row homeLogos logosLargeSection">
        @foreach ($stores as $store)
            @if ($store->featured)
                <div class="col-sm-2">
                    <a href="/store/{{$store->slug}}">
                        <img class="w-full" src="{{$store->image}}" alt="Sunset in the mountains">
                    </a>
                </div>
            @endif

        @endforeach
    </div>
    <!--  only for other than extra small -->


</div>
@endif
