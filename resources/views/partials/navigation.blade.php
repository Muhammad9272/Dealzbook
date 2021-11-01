<style>
    .navbar-brand img{
        width: 50%;
    }

</style>

@if(session('locale') == 'en')
    <!--Navbar English-->

    <nav class="customMainNav navbar navbar-expand-lg navbar-dark primary-color">
        <div class="container">
            <div class="flex">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="/">
                    <img src="{{asset('assets/images/'.$gs->logo)}}" />
                </a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="@if(request()->path() == '/') active @endif  nav-item">
                        <a class="nav-link" href="/">{{ trans('index.home')}} </a>
                    </li>
                    <li class="@if(request()->path() == 'catalogs') active @endif nav-item">
                        <a class="nav-link" href="/{{ session('locale') }}/catalogs">{{ trans('index.catalogs')}}</a>
                    </li>
                    <li class="@if(request()->path() == 'stores') active @endif nav-item">
                        <a class="nav-link" href="/{{ session('locale') }}/stores">{{ trans('index.stores')}}</a>
                    </li>
                    <li class="@if(request()->path() == 'blog') active @endif nav-item">
                        <a class="nav-link" href="/{{ session('locale') }}/blog">{{ trans('index.blog') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/{{ session('locale') }}/contact-us">{{ trans('index.contact_us') }}</a>
                    </li>

                    <!-- Country Dropdown -->
                    <div>
                        <li class="nav-item dropdown">
                            @if(isset($current_country))
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ucfirst($current_country->name)}}
                                      {{-- <img src="{{ucfirst($current_country->)}}" class="country d-block w-100" alt="..."> --}}
                                </a>

                            @else
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ trans('index.country') }}</a>
                            @endif

                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                @php $ddt="all"; @endphp
                                <a class="dropdown-item" href="/{{session('locale')}}/country/{{$ddt}}">All</a>
                                @if(count($all_countries) > 0)

                                    @foreach($all_countries as $country)
                                        <a class="dropdown-item" href="/{{session('locale')}}/country/{{$country->slug}}">
                                            {{-- <img src="{{$country->image}}" class="country d-block w-100" alt="..."> --}}
                                            {{$country->name}}
                                        </a>
                                    @endforeach
                                @endif

                            </div>
                        </li>
                    </div>

                    <!-- Country Dropdown end -->

                    <!-- Dropdown -->
                    <div>
                        <li class="nav-item dropdown">
                            @isset($current_city)
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ucfirst($current_city->name)}}</a>

                            @else
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ trans('index.city') }}</a>
                            @endisset

                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

                                <a class="dropdown-item" href="/">All</a>
                                @if(count($all_cites) > 0)

                                    @foreach($all_cites as $city)
                                        <a class="dropdown-item" href="/{{session('locale')}}/city/{{$city->slug}}">{{$city->name}}</a>
                                    @endforeach
                                @endif

                            </div>
                        </li>
                    </div>

                    <!-- Dropdown -->
                    <div>
                        <li class="nav-item dropdown">
                            @if(session('locale'))
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ucfirst(session('locale'))}}</a>

                            @else
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">Language</a>
                            @endif


                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

                                <a class="dropdown-item" href="/language/en">English</a>
                                <a class="dropdown-item" href="/language/ar">Arabic</a>
                            </div>
                        </li>
                    </div>


                </ul>
                <!-- Links -->
            </div>
            <!-- Collapsible content -->
        </div>
    </nav>
    <!--/.Navbar English-->
@else
    <!--Navbar Arabic-->

    <nav class="customMainNav navbar navbar-expand-lg navbar-dark primary-color">
        <div class="container">

            <div class="flex">
                <!-- Navbar brand -->
                <a class="d-block d-sm-none navbar-brand" href="/">
                    <img src="{{asset('assets/images/'.$gs->logo)}}" />
                </a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>


            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">

                    <!-- Dropdown -->
                    <div>
                        <li class="nav-item dropdown">
                            @if(session('locale'))
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ucfirst(session('locale'))}}</a>

                            @else
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">Language</a>
                            @endif


                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

                                <a class="dropdown-item" href="/language/en">English</a>
                                <a class="dropdown-item" href="/language/ar">Arabic</a>
                            </div>
                        </li>
                    </div>

                    <!-- Dropdown -->
                    <div>
                        <li class="nav-item dropdown">
                            @isset($current_city)
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ucfirst($current_city->name)}}</a>

                            @else
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ trans('index.city') }}</a>
                            @endisset

                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

                                <a class="dropdown-item" href="/">All</a>
                                @if(count($all_cites) > 0)

                                    @foreach($all_cites as $city)
                                        <a class="dropdown-item" href="/{{session('locale')}}/city/{{$city->slug}}">{{$city->name}}</a>
                                    @endforeach
                                @endif

                            </div>
                        </li>
                    </div>

                    <!-- Country Dropdown -->
                    <div>
                        <li class="nav-item dropdown">
                            @if(isset($current_country))
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ucfirst($current_country->name)}}
                                </a>

                            @else
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ trans('index.country') }}</a>
                            @endif

                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

                                <a class="dropdown-item" href="/">All</a>
                                @if(count($all_countries) > 0)

                                    @foreach($all_countries as $country)
                                        <a class="dropdown-item" href="/{{session('locale')}}/country/{{$country->slug}}">
                                            {{$country->name}}
                                            {{-- <img src="{{$country->image}}" class="country d-block w-100" alt="..."> --}}
                                        </a>
                                    @endforeach
                                @endif

                            </div>
                        </li>
                    </div>

                    <!-- Country Dropdown end -->
                    <li class="nav-item">
                        <a class="nav-link" href="/{{ session('locale') }}/contact-us">{{ trans('index.contact_us') }}</a>
                    </li>

                    <li class="@if(request()->path() == 'blog') active @endif nav-item">
                        <a class="nav-link" href="/{{ session('locale') }}/blog">{{ trans('index.blog') }}</a>
                    </li>

                    <li class="@if(request()->path() == 'stores') active @endif nav-item">
                        <a class="nav-link" href="/{{ session('locale') }}/stores">{{ trans('index.stores')}}</a>
                    </li>

                    <li class="@if(request()->path() == 'catalogs') active @endif nav-item">
                        <a class="nav-link" href="/{{ session('locale') }}/catalogs">{{ trans('index.catalogs')}}</a>
                    </li>

                    <li class="@if(request()->path() == '/') active @endif  nav-item">
                        <a class="nav-link" href="/">{{ trans('index.home')}} </a>
                    </li>

                </ul>
                <!-- Links -->
            </div>
            <!-- Collapsible content -->

            <!-- Navbar brand -->
            <a class="d-none d-sm-block navbar-brand textAlignRight" href="/">
                <img src="{{asset('assets/images/'.$gs->logo)}}" />
            </a>
            <!-- Navbar brand end-->

        </div>
    </nav>
    <!--/.Navbar Arabic-->
@endif

