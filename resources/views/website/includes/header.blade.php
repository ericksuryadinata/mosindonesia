<header id="header" class="header light">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 xs-mb-10">
                    <div class="topbar-call text-center text-md-left">
                        <ul>
                            <li><i class="far fa-envelope theme-color"></i> {{$contact->email}}</li>
                            <li><i class="fa fa-mobile-alt"></i> <a href="tel:{{$contact->phone}}">
                                    <span>{{$contact->phone}}</span> </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="topbar-social text-center text-md-right">
                        <ul>
                            @foreach($socialMedia as $social_media)
                            <li><a href="{{ $social_media->url }}" target="_blank"><span
                                        class="ti-{{ $social_media->type }}"></span></a></li>
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
                                    <a href="{{ route('website.home.landing.index') }}"><img
                                            src="{{ asset($setting->showlogo()) }}" alt="logo"> </a>
                                </li>
                            </ul>
                            <!-- menu links -->
                            <div class="menu-bar">
                                <ul class="menu-links">
                                    <li class="{{ ($menu == 'Beranda') ? 'active':'' }}"><a href="{{route('website.home.landing.index')}}">Beranda </a> </li>
                                    <li class="{{ ($menu == 'Tentang Kami') ? 'active':'' }}"><a href="#">Tentang Kami </a> </li>
                                    <li class="{{ ($menu == 'Layanan') ? 'active':'' }}"><a href="{{route('website.service.index')}}">Layanan </a> </li>
                                    <li class="{{ ($menu == 'Blog') ? 'active':'' }}"><a href="javascript:void(0)">Blog <i class="fas fa-angle-down"></i> </a>
                                        <ul class="drop-down-multilevel left-side">
                                            @foreach ($categoryArticles as $category)
                                            <li class="{{ (@$subMenu == $category->name) ? 'active':'' }}"><a href="{{route('website.blog.category', $category->slug)}}">{{$category->name}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="{{ ($menu == 'Kontak Kami') ? 'active':'' }}"><a href="{{route('website.contact-us.index')}}">Kontak Kami</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </nav>
        <!-- menu end -->
    </div>
</header>
