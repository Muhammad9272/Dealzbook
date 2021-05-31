@if(!empty($page_description))
<div class="container pageDescription">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body @if(session('locale') == 'ar') richTextBody @endif">
                    <p class="card-text">{!! $page_description->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
