@extends('master')

@section('title', '— '.  ($branch->seoTags?$branch->seoTags->title:'') )
@section('description', ($branch->seoTags?$branch->seoTags->description:'')  )
@section('image',($store?preg_replace('/\s+/','%20',$store->image):''))

@section('content')
<style type="text/css">
    .table-responsive{
        display: table !important;
    }
    @media (max-width: 767.98px) {
        .table-responsive{
            display: block !important;
        }
    }
</style>

<div class="container ">
    <div class="row storeInfo" style="margin-top:100px">

        <div class="col-12 col-md-4">

            <div class="card">
                <img class="w-full" src="{{$store->image}}" alt="Sunset in the mountains">
            </div>

        </div>

        {{--  store details  --}}
         @if(session('locale') == 'en')
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{$branch->name}}</h2>
                    <h3>{{$store->name}}</h3>
                </div>
                <div class="card-body">
                      <p class="card-text">{!! $branch->about !!}</p>
                      <table class="table table-hover table-responsive">
                        <thead>
                         
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ trans('index.branch') }}</th>
                                <td>
                                    {{$branch->name}}
                                </td>
                            </tr>
                            {{--  --}}
                           
                            <tr>
                                <th scope="row">{{ trans('index.address') }}</th>
                                <td>
                                    {{$branch->address}}
                                </td>
                                </tr>
                              <tr>
                                <th scope="row">{{ trans('index.phone') }}</th>
                                <td>
                                   {{$branch->telephone}}
                                </td>
                              </tr>
                              
                              <tr>
                                <th scope="row">{{ trans('index.email') }}</th>
                                <td>
                                    <a href="mailto:{{$branch->email}}"  class="no-underline hover:underline text-blue-500">{{$branch->email}}</a>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">{{ trans('index.opening_hours') }}</th>
                                <td>
                                    {{$branch->opening_hours}}
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">{{ trans('index.location') }}</th>
                                <td>
                                    <a href="{{$branch->map_location}}" target="_blank" class="no-underline hover:underline text-blue-500">
                                    {{ trans('index.maps_directions') }}</a>
                                </td>
                              </tr>


                          <tr>
                            <th scope="row">{{ trans('index.website_link') }}</th>
                            <td>
                                <a href="{{$store->website_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->website_link}}</a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">{{ trans('index.facebook_link') }}</th>
                            <td>
                                <a href="{{$store->facebook_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->facebook_link}}</a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">{{ trans('index.twitter_link') }}</th>
                            <td>
                                <a href="{{$store->twitter_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->twitter_link}}</a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">{{ trans('index.instagram_link') }}</th>
                            <td>
                                <a href="{{$store->instagram_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->instagram_link}}</a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">{{ trans('index.youtube_link') }}</th>
                            <td>
                                <a href="{{$store->youtube_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->youtube_link}}</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        @else
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:right;">
                    <h2>{{$branch->name}}</h2>
                    <h3>{{$store->name}}</h3>
                </div>
                <div class="card-body">
                      <p class="card-text">{!! $branch->about !!}</p>
                      <table class="table table-hover table-responsive" style="text-align: right; direction: rtl;">
                        <thead>
                         
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ trans('index.branch') }}</th>
                                <td>
                                    {{$branch->name}}
                                </td>
                            </tr>
                            {{--  --}}
                           
                            <tr>
                                <th scope="row">{{ trans('index.address') }}</th>
                                <td>
                                    {{$branch->address}}
                                </td>
                                </tr>
                              <tr>
                                <th scope="row">{{ trans('index.phone') }}</th>
                                <td>
                                   {{$branch->telephone}}
                                </td>
                              </tr>
                              
                              <tr>
                                <th scope="row">{{ trans('index.email') }}</th>
                                <td>
                                    <a href="mailto:{{$branch->email}}"  class="no-underline hover:underline text-blue-500">{{$branch->email}}</a>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">{{ trans('index.opening_hours') }}</th>
                                <td>
                                    {{$branch->opening_hours}}
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">{{ trans('index.location') }}</th>
                                <td>
                                    <a href="{{$branch->map_location}}" target="_blank" class="no-underline hover:underline text-blue-500">
                                    {{ trans('index.maps_directions') }}</a>
                                </td>
                              </tr>


                          <tr>
                            <th scope="row">{{ trans('index.website_link') }}</th>
                            <td>
                                <a href="{{$store->website_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->website_link}}</a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">{{ trans('index.facebook_link') }}</th>
                            <td>
                                <a href="{{$store->facebook_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->facebook_link}}</a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">{{ trans('index.twitter_link') }}</th>
                            <td>
                                <a href="{{$store->twitter_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->twitter_link}}</a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">{{ trans('index.instagram_link') }}</th>
                            <td>
                                <a href="{{$store->instagram_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->instagram_link}}</a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">{{ trans('index.youtube_link') }}</th>
                            <td>
                                <a href="{{$store->youtube_link}}" target="_blank" class="no-underline hover:underline text-blue-500">{{$store->youtube_link}}</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        @endif
    </div>
    {{--  -- store details end  --}}

    <!-- catalogs of a branch -->
    @include('pages/branch/catalog')
    <!-- catalogs of a branch end -->

</div>


@endsection
