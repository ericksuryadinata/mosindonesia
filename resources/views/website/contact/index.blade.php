@extends('website.layout')

@section('scripts')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@stop

@section('content')
    <!--=================================
    page-title-->

    <section class="page-title bg-overlay-black-60 parallax" data-jarallax='{"speed": 0.6}' style="background-image: url({{ asset($setting->showbgbanner()) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-name">
                        <h1>Kontak</h1>
                        <p>Beberapa Cara Menghubungi Kami</p>
                    </div>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('landing.index') }}"><i class="fa fa-home"></i> Beranda</a> <i class="fa fa-angle-double-right"></i></li>
                        <li><span>Kontak</span> </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    page-title -->

    <section class="contact white-bg page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h6>Mari Bekerja Sama</h6>
                        <h2>Silahkan Hubungi Kami!</h2>
                        <p>Apapun Pertanyaan Anda Silahkan Kontak Kami</p>
                    </div>
                </div>
            </div>
            <div class="touch-in white-bg">
                <div class="row">
                    <div class="col-lg-4 col-md-4 sm-mb-30">
                        <div class="contact-box text-center h-100">
                            <i class="ti-map-alt theme-color"></i>
                            <h4 class="mt-15">Alamat Kami</h4>
                            <p>{{ $contact->address }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 sm-mb-30">
                        <div class="contact-box text-center h-100">
                            <i class="ti-mobile theme-color"></i>
                            <h4 class="mt-15">Nomor yang Dapat Dihubungi</h4>
                            <p>{{ $contact->phone }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 sm-mb-30">
                        <div class="contact-box text-center h-100">
                            <i class="ti-email theme-color"></i>
                            <h4 class="mt-15">Email Kami</h4>
                            <p>{{ $contact->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="mt-50 mb-30">Jangan sungkan-sungkan untuk menghubungi kami apabila Anda memiliki pertanyaan terkait perusahaan kami. Kami akan membalas pesan Anda secepat yang kami bisa.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="formmessage">Success/Error Message Goes Here</div>
                    <form role="form" method="post" action="{{ route('contact.store') }}">
                        {{ csrf_field() }}
                        @if (Session::has('status'))
                            <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                        @endif
                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="contact-form clearfix">
                            <div class="section-field">
                                <input id="name" type="text" placeholder="Nama Lengkap*" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="section-field">
                                <input type="email" placeholder="Alamat Email*" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="section-field">
                                <input type="text" placeholder="Nomor yang Dapat Dihubungi*" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>
                            <div class="section-field textarea">
                                <textarea class="input-message form-control" placeholder="Pesan yang Ingin Anda Tanyakan*" rows="7" name="description">{{ old('description') }}</textarea>
                            </div>
                            <!-- Google reCaptch-->
                            <div class="g-recaptcha section-field clearfix" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                            <div class="section-field submit-button">
                                <button id="submit" name="submit" type="submit" value="Send" class="button"><span> Send message </span> <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                    <div id="ajaxloader" style="display:none"><img class="mx-auto mt-30 mb-30 d-block" src="images/pre-loader/loader-02.svg" alt=""></div>
                </div>
            </div>
        </div>
        <div class="map-open">
            <div class="col-lg-12 gmap gmap-p" style="height: 100%;">
                {!! $contact->g_map !!}
            </div>
        </div>
    </section>
@stop
