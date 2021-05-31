@extends('master')

@section('title', ': '.  optional($about[0])->seoTags->title  )
@section('description', optional($about[0])->seoTags->description  )

@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <div class="container">

        <div class="row">
            <div class="col-sm-12">

                @foreach($about as $content)
                    <div>
                        <p>
                            {!! $content->body !!}
                        </p>

                    </div>
                @endforeach

            </div>

        </div>


    </div>

@endsection


