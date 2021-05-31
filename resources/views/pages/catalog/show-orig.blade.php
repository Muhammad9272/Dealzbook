@extends('master')

@section('title', '- About Page')

@section('content')

<div class="row catalogInfo">

    <div class="col-sm-4">
        @foreach ($catalog->images as $image)

            @if ($image->featured)
                <div class="card">


                    <img id="image" class="w-full" src="{{$image->image}}" alt="Sunset in the mountains">
                    <p class="text-gray text-base text-center">
                        {{--  <a href="" class="no-underline hover:underline text-blue-500 ">View Catalog</a>  --}}
                        @if(!empty($catalog->end_at))
                            @if( $catalog->end_at <= date('Y-m-d'))
                                <div class="expired"><span class="badge badge-danger">Expired</span></div>
                            @endif
                        @endif

                    </p>
                </div>


            @endif

        @endforeach
    </div>

    {{--  catalog details  --}}
    <div class="col-sm-8 catalogDetails">
        <div class="card">
            <div class="card-header">
              {{ $catalog->name}}
            </div>
            <div class="card-body">
              <p class="card-text">{{$catalog->description}}.</p>
              <p>By: <a class="no-underline hover:underline text-blue-500" href="/store/{{$catalog->store->name}}">{{$catalog->store->name}}</a></p>

              <table class="table table-hover">
                <thead>

                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Start Date</th>
                    <td>{{$catalog->start_at}}</td>
                  </tr>
                  <tr>
                    <th scope="row">End Date</th>
                    <td>{{$catalog->end_at}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Pages#</th>
                    <td colspan="2">{{count($catalog->images)}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Total Views</th>
                    <td colspan="2">{{$catalog->total_views}}</td>
                  </tr>
                  @if(count($catalog->pdfs))
                    <tr>
                        <th scope="row">Attached PDfs</th>
                        @foreach($catalog->pdfs as $pdf)
                            <td colspan="2">
                                <a target="_blanck" href="{{$pdf->pdf}}">{{$pdf->pdf}}</a>
                                </td>
                        @endforeach
                    </tr>
                    @endif
                  <tr>
                    <th scope="row">Added On</th>
                    <td colspan="2">{{$catalog->created_at}}</td>
                  </tr>
                </tbody>
              </table>

            </div>
        </div>
        <h2>Click on any image to browse catalog</h2>

        <div class="col-sm-12">
            <div>
                <div class= "row" id="images">
                    @foreach ($catalog->images as $image)
                        <div class="col-sm-3"><img src="{{$image->image}}" alt="Picture 1"></div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
    {{--  -- Catalog details end  --}}

    {{--  ======================= catalog availability ==========================  --}}

    <div class="row">
        <p class="text-lg col-sm-12">Available In</p>
        <div id="accordion" class="col-sm-12">

            @foreach ($catalog_cities as $city)

                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                        <button class="" data-toggle="collapse" data-target="#{{$city->slug}}" aria-expanded="true" aria-controls="{{$city->slug}}">
                        {{$city->name}}
                        </button>
                        </h5>
                    </div>

                    <div id="{{$city->slug}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">

                            @foreach($catalog->branches as $branch)
                                @if($branch->city_id == $city->id)

                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <a href="/{{$branch->store->slug}}/{{$branch->city->slug}}/{{$branch->slug}}">
                                                    <button class="btn btn-link">
                                                        {{$branch->name}}
                                                    </button>
                                                </a>
                                            </h5>
                                        </div>

                                        <div id="{{$branch->slug}}" >
                                            <div class="card-body">
                                                <table class="table table-hover">
                                                    <thead>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row"><i class="material-icons">home</i></th>
                                                        <td>{{$branch->address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><i class="material-icons">phone</i></th>
                                                        <td>{{$branch->telephone}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><i class="material-icons">contact_phone</i></th>
                                                        <td>{{$branch->fax}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><i class="material-icons">email</i></th>
                                                        <td>
                                                            <a href="mailto:{{$branch->email}}">{{$branch->email}}</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><i class="material-icons">map</i></th>
                                                        <td>
                                                            <a href="{{$branch->map_location}}"> Map & Directions
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><i class="material-icons">access_time</i></th>
                                                        <td>{{$branch->opening_hours}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><i class="material-icons">call_made</i></th>
                                                        <td>
                                                            <a href="{{$branch->slug}}" target="_blank">
                                                                View Branch Details
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                @endif

                            @endforeach

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="alert alert-success notice" role="alert">
            <p>
                Above listed store information and timings are to the best of our knowledge and may change without prior notice.
            </p>
            <p>
                Timings may change during Ramadan and public holidays and hence kindly check with the stores to avoid last minute disappointments.
            </p>
        </div>


    </div>
    {{--  ============================ catalog availability end==================  --}}

    {{--  ============================ catalog's tag ==================  --}}
            @if(count($catalog->tags))
                <div class="card tags">

                    <div class="card-body">
                        @foreach ($catalog->tags as $tag)
                        <a href="/tag/{{$tag->slug}}">
                            <button type="button" class="btn btn-primary">
                                {{$tag->name}}
                            </button>
                        </a>
                        @endforeach
                    </div>

                </div>
            @endif

    {{--  ============================ catalog's tag end ==================  --}}


    <!-- latest catalogs -->
    <h2 class="text-3xl mt-8">Latest Catalogs</h2>
    @include('partials/catalogs/latest')
    <!-- latest catalogs end-->

</div>


@endsection

<link href="{{ asset('css/viewer.css') }}" rel="stylesheet">

<script src="{{ asset('js/viewer.js') }}" defer></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
