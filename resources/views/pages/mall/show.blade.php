@extends('master')

@section('title', '- About Page')

@section('content')

<div class="row mallInfo">


    {{--  Mall details  --}}
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3>{{$mall->name}}</h3>
            </div>
            <div class="card-body">
              <p class="card-text">{!! $mall->about !!}</p>

              <table class="table table-hover">
                <thead>
                 
                </thead>
                <tbody>
                   
                    <tr>
                        <th scope="row">Address</th>
                        <td>
                            {{$mall->address}}
                        </td>
                        </tr>
                      <tr>
                        <th scope="row">Telephone</th>
                        <td>
                           {{$mall->telephone}}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Opening Hours</th>
                        <td>
                            {{$mall->opening_hours}}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Location</th>
                        <td>
                            <a href="{{$mall->map_location}}" target="_blank" class="no-underline hover:underline text-blue-500">MAP & DIRECTIONS</a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">City</th>
                        <td>
                           {{$mall->city->name}}
                        </td>
                      </tr>

                </tbody>
              </table>

            </div>
        </div>
    </div>
</div>
    {{--  Mall details end  --}}

</div>


@endsection
