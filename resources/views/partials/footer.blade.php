<div class="footer">

    @if(session('locale') == 'en')
        <!-- ===================================  for screen greater than extra small ========================== -->
        <div class="d-none d-sm-block container">

            <nav role='navigation' class="main-nav" id="main-nav">
                <ul id="main-nav-list">
                    <li>
                        <a href="/">
                            <div>
                                {{ trans('index.home')}}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/{{ session('locale') }}/stores">
                            <div>
                                {{ trans('index.stores')}}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/{{ session('locale') }}/catalogs">
                            <div>
                                {{ trans('index.catalogs')}}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/{{session('locale')}}/about-us">
                            <div>
                                {{ trans('index.about')}}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/{{ session('locale') }}/faq">
                            <div>
                                {{ trans('index.faq')}}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/{{session('locale')}}/contact-us">
                            <div>
                                {{ trans('index.contact_us')}}
                            </div>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="/{{session('locale')}}/sitemap">
                            <div>
                                {{ trans('index.sitemap')}}
                            </div>
                        </a>
                    </li> --}}
                    <li>
                        <a href="/{{session('locale')}}/terms">
                            <div>
                              {{ trans('index.terms') }}
                            </div>
                        </a>
                    </li>

                    {{-- <p class="subHeading2"><a href="/terms">{{ trans('index.terms') }}</a></p> --}}

                </ul>
            </nav>

            <div class="row subHeading">
                <div class="col-sm-3 pd-l-3">
                    <p class="subHeading2">{{ trans('index.stores')}}</p>

                    @foreach ($recent_stores as $store)
                        <p><a href="/{{ session('locale') }}/store/{{$store->slug}}">{{$store->name}}</a></p>
                    @endforeach

                    <p><a href="">{{ trans('index.all_stores') }}</a></p>

                </div>
                <div class="col-sm-3">
                    <p class="subHeading2">{{ trans('index.cities') }}</p>

                    @foreach ($recent_cities as $city)

                        <p><a class="@if(!empty (request('city') && request('city') == $city->slug )) active @endif" href="/{{session('locale')}}/city/{{$city->slug}}">{{$city->name}}</a></p>

                    @endforeach

                    <p><a href="/">{{ trans('index.all_cities')}}</a></p>

                </div>

                <div class="col-sm-3">
                    <p class="subHeading2">{{ trans('index.countries') }}</p>

                    @foreach ($recent_countries as $country)

                        <p><a class="@if(!empty (request('country') && request('country') == $country->slug )) active @endif" href="/{{session('locale')}}/country/{{$country->slug}}">{{$country->name}}</a></p>

                    @endforeach

                </div>

                <div class="col-sm-3">
                    {{-- <p class="subHeading2"><a href="/terms">{{ trans('index.terms') }}</a></p> --}}

                    <p class="subHeading2">{{ trans('index.follow') }}</p>

                    <div class="social social-link-f">
                        @if($social)
                            @if($social->f_status==1)
                            <a href="{{$social->facebook}}"><img src="/img/icons/facebook.svg" /></a>
                            @endif
                            @if($social->t_status==1)
                            <a href="{{$social->twitter}}"><img src="/img/icons/twitter.svg" /></a>
                            @endif
                            @if($social->i_status==1)
                            <a href="{{$social->instagram}}"><img src="/img/icons/instagram.svg" /></a>
                            @endif
                            @if($social->l_status==1)
                            <a href="{{$social->linkedin}}"><img src="/img/icons/linkedin.svg" /></a>
                            @endif                            
                            @if($social->y_status==1)
                            <a href="{{$social->youtube}}"><img src="/img/icons/youtube.svg" /></a>
                            @endif


                        @endif
                    </div>
                    <div class="app_store">
                        <div class="links">
                            <a href="{{$social->linkedin}}"><img src="/img/icons/Google.svg" /></a>
                            <a href="{{$social->linkedin}}"><img src="/img/icons/App.svg" /></a>
                        </div>
                    </div>


                </div>
            </div>

                {{-- <hr> --}}
                <div class="copyright_d">
                    <p>{{$gs->copyright}}</p>
                </div>

        </div>
        <!--  =================================== for screen greater than extra small end  ===================================-->

        <!-- ========================== only for extra small ======================== -->
            <div class="d-block d-sm-none container">

                    <div class="row">
                        <div class="col-6 displayBlock navigationLinksForExtraSmallScreen">

                            <a class="displayBlock darkGray" href="/">
                                {{ trans('index.home')}}
                            </a>

                            <a class="displayBlock darkGray"  href="/{{ session('locale') }}/stores">
                                {{ trans('index.stores')}}
                            </a>

                            <a class="displayBlock darkGray"  href="/{{ session('locale') }}/catalogs">
                                {{ trans('index.catalogs')}}
                            </a>

                            <a class="displayBlock darkGray"  href="/{{session('locale')}}/about-us">
                                {{ trans('index.about')}}
                            </a>

                        </div>

                        <div class="col-6 navigationLinksForExtraSmallScreen">
                            <a class="darkGray displayBlock" href="/{{ session('locale') }}/faq">
                                <div>
                                    {{ trans('index.faq')}}
                                </div>
                            </a>
                            <a class="darkGray displayBlock" href="/{{session('locale')}}/contact-us">
                                <div>
                                    {{ trans('index.contact_us')}}
                                </div>
                            </a>
                            <a class="darkGray displayBlock" href="/{{session('locale')}}/contact-us">
                                <div>
                                    {{ trans('index.terms') }}
                                </div>
                            </a>

                        </div>
                    </div>

                <div class="row subHeading">

                    <section class="accordianForExtraSmall accordion-section clearfix mt-3" aria-label="Question Accordions">

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="borderGrayTop panel panel-default">
                                        <div class="panel-heading mb-3" role="tab" id="heading0">
                                            <h3 class="simpleFlex panel-title">
                                                <a class="collapsed d-inline-flex" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                                                    Stores
                                                     <img class="footerSmallScreenDropdownIcon ml-10" src="/img/icons/arrow-down.svg" />
                                                </a>
                                               
                                            </h3>
                                        </div>
                                        <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                                            <div class="panel-body px-3 mb-4">
                                                @foreach ($recent_stores as $store)
                                                    <p class="textAlignCenter"><a href="/store/{{$store->slug}}">{{$store->name}}</a></p>
                                                @endforeach

                                                <p class="textAlignCenter"><a href="">{{ trans('index.all_stores') }}</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="borderGrayTop borderGrayBottom panel panel-default">
                                        <div class="panel-heading  mb-3" role="tab" id="heading1">
                                            <h3 class="simpleFlex panel-title">
                                                <a class="collapsed d-inline-flex" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                    Cities
                                                    <img class="footerSmallScreenDropdownIcon ml-10" src="/img/icons/arrow-down.svg" />
                                                </a>
                                                
                                            </h3>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                            <div class="panel-body px-3 mb-4">
                                                @foreach ($recent_cities as $city)

                                                    <p class="textAlignCenter"><a class="@if(!empty (request('city') && request('city') == $city->slug )) active @endif" href="/{{session('locale')}}/city/{{$city->slug}}">{{$city->name}}</a></p>

                                                @endforeach

                                                <p class="textAlignCenter"><a href="/">{{ trans('index.all_cities')}}</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="borderGrayTop borderGrayBottom panel panel-default">
                                        <div class="panel-heading  mb-3" role="tab" id="heading2">
                                            <h3 class="simpleFlex panel-title">
                                                <a class="collapsed d-inline-flex" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse1">
                                                    {{ trans('index.countries') }}
                                                    <img class="footerSmallScreenDropdownIcon ml-10" src="/img/icons/arrow-down.svg" />
                                                </a>
                                                
                                            </h3>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                            <div class="panel-body px-3 mb-4">
                                                @foreach ($recent_countries as $country)

                                                    <p class="textAlignCenter"><a class="@if(!empty (request('country') && request('country') == $country->slug )) active @endif" href="/{{session('locale')}}/country/{{$country->slug}}">{{$country->name}}</a></p>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </section>

                    <div class="col-sm-3">


                    </div>
                    <div class="col-sm-3">
                        <h4 class="subHeading2 textAlignCenter">{{ trans('index.follow') }}</h4>
                        <div class="social social-link-f">
                            @if($social)
                                @if($social->f_status==1)
                                <a href="{{$social->facebook}}"><img src="/img/icons/facebook.svg" /></a>
                                @endif
                                @if($social->t_status==1)
                                <a href="{{$social->twitter}}"><img src="/img/icons/twitter.svg" /></a>
                                @endif
                                @if($social->i_status==1)
                                <a href="{{$social->instagram}}"><img src="/img/icons/instagram.svg" /></a>
                                @endif
                                @if($social->l_status==1)
                                <a href="{{$social->linkedin}}"><img src="/img/icons/linkedin.svg" /></a>
                                @endif                            
                                @if($social->y_status==1)
                                <a href="{{$social->youtube}}"><img src="/img/icons/youtube.svg" /></a>
                                @endif


                            @endif
                        </div>
                        <div class="app_store">
                            <div class="links">
                                <a href="{{$social->linkedin}}"><img src="/img/icons/Google.svg" /></a>
                                <a href="{{$social->linkedin}}"><img src="/img/icons/App.svg" /></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- ========================= only for extra small end ========================= -->
        @else
        <!-- ===================================  for screen greater than extra small ========================== -->
        <div class="d-none d-sm-block container">

            <nav role='navigation' class="main-nav" id="main-nav">
                <ul id="main-nav-list">
                    {{-- <li>
                        <a href="/{{session('locale')}}/sitemap">
                            <div>
                                {{ trans('index.sitemap')}}
                            </div>
                        </a>
                    </li> --}}
                    <li>
                        <a href="/{{session('locale')}}/terms">
                            <div>
                              {{ trans('index.terms') }}
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="/{{ session('locale') }}/contact-us">
                            <div>
                                {{ trans('index.contact_us')}}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/{{ session('locale') }}/faq">
                            <div>
                                {{ trans('index.faq')}}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/{{session('locale')}}/about-us">
                            <div>
                                {{ trans('index.about')}}
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/{{ session('locale') }}/catalogs">
                            <div>
                                {{ trans('index.catalogs')}}
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="/{{ session('locale') }}/stores">
                            <div>
                                {{ trans('index.stores')}}
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="/">
                            <div>
                                {{ trans('index.home')}}
                            </div>
                        </a>
                    </li>


                </ul>
            </nav>

            <div class="row subHeading">
                <div class="col-sm-3 pd-l-3">


                    <p class="subHeading2">{{ trans('index.follow') }}</p>

                    <div class="social social-link-f">
                        @if($social)
                            @if($social->f_status==1)
                            <a href="{{$social->facebook}}"><img src="/img/icons/facebook.svg" /></a>
                            @endif
                            @if($social->t_status==1)
                            <a href="{{$social->twitter}}"><img src="/img/icons/twitter.svg" /></a>
                            @endif
                            @if($social->i_status==1)
                            <a href="{{$social->instagram}}"><img src="/img/icons/instagram.svg" /></a>
                            @endif
                            @if($social->l_status==1)
                            <a href="{{$social->linkedin}}"><img src="/img/icons/linkedin.svg" /></a>
                            @endif                            
                            @if($social->y_status==1)
                            <a href="{{$social->youtube}}"><img src="/img/icons/youtube.svg" /></a>
                            @endif


                        @endif
                    </div>
                    <div class="app_store">
                        <div class="links">
                            <a href="{{$social->linkedin}}"><img src="/img/icons/Google.svg" /></a>
                            <a href="{{$social->linkedin}}"><img src="/img/icons/App.svg" /></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <p class="subHeading2">{{ trans('index.countries') }}</p>

                    @foreach ($recent_countries as $country)

                        <p><a class="@if(!empty (request('country') && request('country') == $country->slug )) active @endif" href="/{{session('locale')}}/country/{{$country->slug}}">{{$country->name}}</a></p>

                    @endforeach

                </div>

                <div class="col-sm-3">
                    <p class="subHeading2">{{ trans('index.cities') }}</p>

                    @foreach ($recent_cities as $city)

                        <p><a class="@if(!empty (request('city') && request('city') == $city->slug )) active @endif" href="/{{session('locale')}}/city/{{$city->slug}}">{{$city->name}}</a></p>

                    @endforeach

                    <p><a href="/">{{ trans('index.all_cities')}}</a></p>

                </div>

                <div class="col-sm-3">
                    <p class="subHeading2">{{ trans('index.stores')}}</p>

                    @foreach ($recent_stores as $store)
                        <p><a href="/{{ session('locale') }}/store/{{$store->slug}}">{{$store->name}}</a></p>
                    @endforeach

                    <p><a href="">{{ trans('index.all_stores') }}</a></p>

                </div>


            </div>

        </div>
        <!-- ===================================  for screen greater than extra small end ========================== -->

        <!-- ========================== only for extra small arabic version======================== -->
        <div class="d-block d-sm-none container">

            <div class="row">
                
                <div class="col-6 navigationLinksForExtraSmallScreen">
                    <a class="textAlignRight darkGray displayBlock" href="/{{ session('locale') }}/faq">
                        <div>
                            {{ trans('index.faq')}}
                        </div>
                    </a>
                    <a class="textAlignRight darkGray displayBlock" href="/{{session('locale')}}/contact-us">
                        <div>
                            {{ trans('index.contact_us')}}
                        </div>
                    </a>
                    <a class="textAlignRight darkGray displayBlock" href="/{{session('locale')}}/contact-us">
                        <div>
                            {{ trans('index.terms') }}
                        </div>
                    </a>

                </div>

                <div class="col-6 displayBlock navigationLinksForExtraSmallScreen">

                    <a class="textAlignRight displayBlock darkGray" href="/">
                        {{ trans('index.home')}}
                    </a>

                    <a class="textAlignRight displayBlock darkGray"  href="/{{ session('locale') }}/stores">
                        {{ trans('index.stores')}}
                    </a>

                    <a class="textAlignRight displayBlock darkGray"  href="/{{ session('locale') }}/catalogs">
                        {{ trans('index.catalogs')}}
                    </a>

                    <a class="textAlignRight displayBlock darkGray"  href="/{{session('locale')}}/about-us">
                        {{ trans('index.about')}}
                    </a>

                </div>

            </div>

        <div class="row subHeading">

            <section class="accordianForExtraSmall accordion-section clearfix mt-3" aria-label="Question Accordions">

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="borderGrayTop panel panel-default">
                                <div class="panel-heading mb-3" role="tab" id="heading0">
                                    <h3 class="simpleFlex panel-title">
                                        
                                        <a class="textAlignRight collapsed d-inline-flex" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                                            <img class="footerSmallScreenDropdownIcon" src="/img/icons/arrow-down.svg" />
                                            {{  trans('index.stores') }}
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                                    <div class="panel-body px-3 mb-4">
                                        @foreach ($recent_stores as $store)
                                            <p class="textAlignCenter"><a href="/store/{{$store->slug}}">{{$store->name}}</a></p>
                                        @endforeach

                                        <p class="textAlignCenter"><a href="">{{ trans('index.all_stores') }}</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="borderGrayTop borderGrayBottom panel panel-default">
                                <div class="panel-heading  mb-3" role="tab" id="heading1">
                                    <h3 class="simpleFlex panel-title">
                                        
                                        <a class="textAlignRight collapsed d-inline-flex" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                            <img class="footerSmallScreenDropdownIcon" src="/img/icons/arrow-down.svg" />
                                            {{  trans('index.cities') }}
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                    <div class="panel-body px-3 mb-4">
                                        @foreach ($recent_cities as $city)

                                            <p class="textAlignCenter"><a class="@if(!empty (request('city') && request('city') == $city->slug )) active @endif" href="/{{session('locale')}}/city/{{$city->slug}}">{{$city->name}}</a></p>

                                        @endforeach

                                        <p class="textAlignCenter"><a href="/">{{ trans('index.all_cities')}}</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="borderGrayTop borderGrayBottom panel panel-default">
                                <div class="panel-heading  mb-3" role="tab" id="heading2">
                                    <h3 class="simpleFlex panel-title">
                                        
                                        <a class="textAlignRight collapsed d-inline-flex" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse1">
                                            <img class="footerSmallScreenDropdownIcon" src="/img/icons/arrow-down.svg" />
                                            {{ trans('index.countries') }}
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                    <div class="panel-body px-3 mb-4">
                                        @foreach ($recent_countries as $country)

                                            <p class="textAlignCenter"><a class="@if(!empty (request('country') && request('country') == $country->slug )) active @endif" href="/{{session('locale')}}/country/{{$country->slug}}">{{$country->name}}</a></p>

                                        @endforeach

                                    </div>
                                </div>
                            </div>

                        </div>

                </section>

            <div class="col-sm-3">


            </div>
            <div class="col-sm-3">
                <h4 class="subHeading2 textAlignCenter">{{ trans('index.follow') }}</h4>

                    <div class="social social-link-f">
                        @if($social)
                            @if($social->f_status==1)
                            <a href="{{$social->facebook}}"><img src="/img/icons/facebook.svg" /></a>
                            @endif
                            @if($social->t_status==1)
                            <a href="{{$social->twitter}}"><img src="/img/icons/twitter.svg" /></a>
                            @endif
                            @if($social->i_status==1)
                            <a href="{{$social->instagram}}"><img src="/img/icons/instagram.svg" /></a>
                            @endif
                            @if($social->l_status==1)
                            <a href="{{$social->linkedin}}"><img src="/img/icons/linkedin.svg" /></a>
                            @endif                            
                            @if($social->y_status==1)
                            <a href="{{$social->youtube}}"><img src="/img/icons/youtube.svg" /></a>
                            @endif


                        @endif
                    </div>
                    <div class="app_store">
                        <div class="links">
                            <a href="{{$social->linkedin}}"><img src="/img/icons/Google.svg" /></a>
                            <a href="{{$social->linkedin}}"><img src="/img/icons/App.svg" /></a>
                        </div>
                    </div>
            </div>
        </div>

    </div>
        <!-- ========================== only for extra small arabic version end ======================== -->

    @endif

</div>
