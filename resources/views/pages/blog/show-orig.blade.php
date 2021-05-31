@extends('master')

@section('title', '- ')

@section('content')


<h1>{{$blog->title}}</h1>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$blog->title}}</h5>
              <p class="card-text">{!! $blog->body !!}</p>
            </div>
        </div>
    </div>
</div>


@endsection
