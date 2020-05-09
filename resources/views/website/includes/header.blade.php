<header id="header" class="header light">
    <div class="topbar topbar-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 xs-mb-10">
                    <div class="topbar-call text-center text-md-left">
                        <ul>
                            <li><i class="far fa-envelope theme-color"></i> {{$contact->email}}</li>
                            <li><i class="fa fa-mobile-alt"></i> <a href="tel:{{$contact->phone}}"> <span>{{$contact->phone}}</span> </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="topbar-social text-center text-md-right">
                        <ul>
                            @foreach($socialMedia as $social_media)
                                <li><a href="{{ $social_media->url }}" target="_blank"><span class="ti-{{ $social_media->type }}"></span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu">
        <!-- menu start -->
        <nav id="menu" class="mega-menu">
            <!-- menu list items container -->
            <section class="menu-list-items">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <!-- menu logo -->
                            <ul class="menu-logo">
                                <li>
                                    <a href="{{ route('website.home.landing.index') }}"><img src="{{ url('website/images/logo.png') }}" alt="logo"> </a>
                                </li>
                            </ul>
                            <!-- menu links -->
                            <div class="menu-bar">
                                <ul class="menu-links">
                                    <li class="active"><a href="#">Home  </a> </li>
                                    <li><a href="#">About us </a> </li>
                                    <li><a href="javascript:void(0)"> Pages <i class="fas fa-angle-down"></i> </a>
                                        <ul class="drop-down-multilevel left-side">
                                            <li><a href="#">services</a> </li>
                                            <li><a href="#">history</a> </li>
                                            <li><a href="#">careers</a> </li>
                                            <li><a href="#">work single</a> </li>
                                            <li><a href="#">blog single</a> </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">work </a> </li>
                                    <li><a href="#">consultants </a> </li>
                                    <li><a href="#">blog </a> </li>
                                    <li><a href="#">Contacts us </a> </li>
                                </ul>
                                {{-- <div class="search-cart">
                                    <div class="search">
                                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                                        <div class="search-box not-click">
                                            <form action="search.html" method="get">
                                                <input type="text" class="not-click form-control" name="search" placeholder="Search.." value="">
                                                <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </nav>
        <!-- menu end -->
    </div>
</header>
