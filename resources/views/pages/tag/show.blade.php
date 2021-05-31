@extends('master')

@section('content')


    <!-- latest catalogs -->
    <h2 class="text-3xl mt-8">{{$tag->name}}</h2>
    @include('partials/catalogs/tags')
    <!-- latest catalogs end-->

@endsection
