@extends('master')

@section('title', 'Terms of Use — All Deals in One Place')

@section('content')

<div class="container">
    <div class="accordion" id="accordionExample">

        <h2 class="@if(session('locale') == 'ar') textAlignRight @endif">{{trans('index.terms')}}</h2>
        @foreach ($terms as $term)
        <h3 class="mt-40">{{$term->title}}</h3>
        <p>{!! $term->description !!}</p>
        @endforeach


    </div>

    @endsection
</div>

