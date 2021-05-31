@extends('master')

@section('title', '- ')

@section('content')


<h1>BLOG</h1>
@foreach ($blogs as $blog)

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$blog->title}}</h5>
              <p class="card-text">{!! Str::limit($blog->body, 400, '') !!}...</p>
              <a href="/blog/{{$blog->slug}}" class="btn btn-primary">Continue Reading</a>
            </div>
        </div>
    </div>
</div>

@endforeach

{{ $blogs->links() }}

@endsection
