@extends('master')

@section('title', '- About Page')

@section('content')

<div class="row storeInfo">

    <div class="col-sm-4">

        <div class="card">
            <img class="w-full" src="{{$store->image}}" alt="Sunset in the mountains">
            <p class="text-gray text-base text-center">
                <a href="/store/{{$store->slug}}/catalogs" class="no-underline hover:underline text-blue-500 ">Browse this store catalogs</a>
            </p>
        </div>

    </div>

    {{--  store details  --}}
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
              {{ $store->name}}
            </div>
            <div class="card-body">
              <p class="card-text">{!! $store->about !!}</p>

              <table class="table table-hover">
                <thead>
                  
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Website Link</th>
                    <td>
                        <a href="{{$store->website_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->website_link}}</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Facebook Link</th>
                    <td>
                        <a href="{{$store->facebook_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->facebook_link}}</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Twitter Link</th>
                    <td>
                        <a href="{{$store->twitter_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->twitter_link}}</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Instagram Link</th>
                    <td>
                        <a href="{{$store->instagram_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->instagram_link}}</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Youtube Link</th>
                    <td>
                        <a href="{{$store->youtube_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->youtube_link}}</a>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>
        </div>
    </div>
</div>
    {{--  -- store details end  --}}

    {{--  ======================= Store branches ==========================  --}}
    @if(count($in_cities) > 0)
        <div class="row">
            <p class="text-lg col-sm-12">Branches</p>
            <div id="accordion" class="col-sm-12">

                @foreach ($in_cities as $city)

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                            <button class="btn" data-toggle="collapse" data-target="#{{$city->slug}}" aria-expanded="true" aria-controls="{{$city->slug}}">
                            {{$city->name}}
                            </button>
                            </h5>
                        </div>

                        <div id="{{$city->slug}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                            
                                @foreach($store->branches as $branch)
                                    @if($branch->city_id == $city->id)

                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                <a href="/{{$store->slug}}/{{$branch->city->slug}}/{{$branch->slug}}">
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
    @endif
   
    {{--  ============================ Store branches end==================  --}}


</div>


@endsection
