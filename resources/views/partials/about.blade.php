<div class="about">
    <h2 class="d-none mt-80 d-sm-block @if(session('locale') == 'ar') textAlignRight @endif">
        <a href="/{{ session('locale') }}/about-us" style="color:#000">
            {{ trans('index.about') }}
        </a>
    </h2>
    <h2 class="d-block mt-80 d-sm-none textAlignCenter @if(session('locale') == 'ar') textAlignRight @endif">
        <a href="/{{ session('locale') }}/about-us" style="color:#000">
            {{ trans('index.about') }}
        </a>
    </h2>
    @if(session('locale') == 'en')
    <div class="container">
        @foreach ($latest_blog as $blog)
        <div class="row">

            <div class="col-sm-6 aboutContent">

                @foreach($about as $content)
                    <div class="@if(session('locale') == 'ar') richTextBody @endif">

                        <p>
                            {!!$content->small_detail !!}
                        </p>

                    </div>
                @endforeach

            </div>
            <div class="col-sm-6 textAlignRight" >
            <a href="/{{ session('locale') }}/about-us" style="color:#000">
                <img style="width: 70%" src="/img/main-page/about.png" />
            </a>
            </div>

        </div>
        @endforeach
    </div>
    @else

    <div class="container">
        @foreach ($latest_blog as $blog)
        <div class="row">

            <div class="col-sm-6 " >
                <a href="/{{ session('locale') }}/about-us" style="color:#000">
                    <img style="width: 70%" src="/img/main-page/about.png" />
                </a>
            </div>
            <div class="col-sm-6 aboutContent">

                @foreach($about as $content)
                    <div class="@if(session('locale') == 'ar') richTextBody @endif">

                        <p>
                            {!!$content->small_detail !!}
                        </p>

                    </div>
                @endforeach

            </div>
            

        </div>
        @endforeach
    </div>

    @endif

</div>
