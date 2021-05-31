<div class="">

    @foreach ($banners as $banner)
        @if ($banner->image)
        
            <div>
                {{--  <img class="w-full" src="{{$banner->image}}" alt="Sunset in the mountains">  --}}
            </div>
        @endif
      
    @endforeach

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        @foreach ($banners as $key => $value)
            @if($key == 0)
            
                <div class="carousel-item active">

                @if( $value['url'] != "undefined")   
                    <a href="/{{$value['url']}}">
                        <img src="{{$value['image']}}" class="d-block w-100" alt="...">
                    </a>
                    @else
                    {!! $value['ad'] !!}
                @endif
            </div>

            @else
            <div class="carousel-item">

                    @if( $value['url'] != "undefined")   
                    <a href="/{{$value['url']}}">
                        <img src="{{$value['image']}}" class="d-block w-100" alt="...">
                    </a>
                    @else
                    {!! $value['ad'] !!}
                @endif


            </div>
            @endif
        @endforeach
         
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

</div>
