<div class="wrapper">

    <!--=================================
     preloader -->


    <div id="pre-loader">
        <img src="{{ asset('website/images/loader/loader-21.gif') }}" alt="">
    </div>

    <!--=================================
     preloader -->
    @include('website.includes.header')
    @yield('content')
    @include('website.includes.footer')

</div>

<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div>
