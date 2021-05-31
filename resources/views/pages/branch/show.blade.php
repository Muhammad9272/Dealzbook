@extends('master')

@section('title', '- About Page')

@section('content')

<div class="row storeInfo">

    <div class="col-sm-4">

        <div class="card">
            <img class="w-full" src="{{$store->image}}" alt="Sunset in the mountains">
        </div>

    </div>

    {{--  store details  --}}
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h2>{{$branch->name}}</h2>
                <h3>{{$store->name}}</h3>
            </div>
            <div class="card-body">
              <p class="card-text">{!! $branch->about !!}</p>

              <table class="table table-hover">
                <thead>
                 
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Branch</th>
                        <td>
                            {{$branch->name}}
                        </td>
                    </tr>
                    @if($branch->mall)
                    <tr>
                        <th scope="row">Mall</th>
                        <td>
                            <a href="/{{$branch->city->slug}}/{{$branch->mall->slug}}" class="no-underline hover:underline text-blue-500">
                                {{$branch->mall->name}}
                            </a>
                        </td>
                    </tr>
                    @endif()
                   
                    <tr>
                        <th scope="row">Address</th>
                        <td>
                            {{$branch->address}}
                        </td>
                        </tr>
                      <tr>
                        <th scope="row">Telephone</th>
                        <td>
                           {{$branch->telephone}}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Fax</th>
                        <td>
                           {{$branch->fax}}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Email</th>
                        <td>
                            <a href="mailto:{{$branch->email}}"  class="no-underline hover:underline text-blue-500">{{$branch->email}}</a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Opening Hours</th>
                        <td>
                            {{$branch->opening_hours}}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Location</th>
                        <td>
                            <a href="{{$branch->map_location}}" target="_blank" class="no-underline hover:underline text-blue-500">MAP & DIRECTIONS</a>
                        </td>
                      </tr>


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

    <!-- catalogs of a branch -->
    @include('pages/branch/catalog')
    <!-- catalogs of a branch end -->

</div>


@endsection
