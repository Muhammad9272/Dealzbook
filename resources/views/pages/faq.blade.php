@extends('master')

@section('title', 'FAQs')

@section('content')

<div class="container" style="height: 400px;margin-top:50px;margin-bottom: 300px;">
    <div class="accordion" id="accordionExample">

        <h2 style="margin-bottom:50px;" class="@if(session('locale') == 'ar') textAlignRight @endif">{{ trans('index.faq') }}</h2>
        @foreach ($faqs as $faq)
            <div class="card" style="border: 1px solid #d8d0d0;margin-bottom: 20px;">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$faq->id}}id" aria-expanded="true" aria-controls="{{$faq->id}}id">
                        <div class="card-header" id="{{$faq->id}}">
                            <h2 class="mb-0 @if(session('locale') == 'ar') textAlignRight @endif">
                                
                                    {{$faq->question}}
                                
                            </h2>
                        </div>
                </button>

                <div id="{{$faq->id}}id" class="collapse @if($faq->id==1) show @endif" aria-labelledby="{{$faq->id}}" data-parent="#accordionExample">
                    <div class="card-body">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    @endsection
</div>

