@extends('website.layout')

@section('scripts')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@stop

@section('content')

    <section class="contact white-bg page-section-ptb">
        <div class="container">
            <div class="touch-in white-bg">
                <div class="row">
                    <div class="col-lg-4 col-md-4 sm-mb-30">
                        <div class="contact-box text-center h-100">
                            <i class="ti-map-alt theme-color"></i>
                            <h5 class="uppercase mt-20">Address</h5>
                            <p class="mt-20">17504 Carlton Cuevas Rd, Gulfport, MS, 39503</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 sm-mb-30">
                        <div class="contact-box text-center h-100">
                            <i class="ti-mobile theme-color"></i>
                            <h5 class="uppercase mt-20">Phone</h5>
                            <p class="mt-20"> +(704) 279-1249</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 sm-mb-30">
                        <div class="contact-box text-center h-100">
                            <i class="ti-email theme-color"></i>
                            <h5 class="uppercase mt-20">Email</h5>
                            <p class="mt-20">letstalk@webster.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container pos-r">
            <div class="row  full-height">
                <div class="col-lg-6 map-side g-map" id="map" data-type='black'>
                    <div class="contact-map">
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-7 col-md-6 col-sm-12">

                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="contact-3-info page-section-pt">
                        <div class="clearfix">
                            <div class="section-title mb-0">
                                <h6>let's work together</h6>
                                <h2 class="title-effect">Contact Us</h2>
                            </div>
                            <p class="mb-50">It would be great to hear from you! If you got any questions, please do not
                                hesitate to send us a message. We are looking forward to hearing from you! We reply within
                                <span class="tooltip-content" data-original-title="Mon-Fri 10am–7pm (GMT +1)"
                                    data-toggle="tooltip" data-placement="top"> 24 hours!</span></p>
                            <div id="formmessage">Success/Error Message Goes Here</div>
                            <form id="contactform" role="form" method="post" action="php/contact-form.php">
                                <div class="contact-form clearfix">
                                    <div class="section-field">
                                        <input id="name" type="text" placeholder="Name*" class="form-control" name="name">
                                    </div>
                                    <div class="section-field">
                                        <input type="email" placeholder="Email*" class="form-control" name="email">
                                    </div>
                                    <div class="section-field">
                                        <input type="text" placeholder="Phone*" class="form-control" name="phone">
                                    </div>
                                    <div class="section-field textarea">
                                        <textarea class="input-message form-control" placeholder="Comment*" rows="7"
                                            name="message"></textarea>
                                    </div>
                                    <!-- Google reCaptch-->
                                    <div class="g-recaptcha section-field clearfix" data-sitekey="[Add your site key]">
                                    </div>
                                    <div class="section-field submit-button">
                                        <input type="hidden" name="action" value="sendEmail" />
                                        <button id="submit" name="submit" type="submit" value="Send" class="button"><span>
                                                Send message </span> <i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                            <div id="ajaxloader" style="display:none"><img class="mx-auto mt-30 mb-30 d-block"
                                    src="images/pre-loader/loader-02.svg" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section-pb contact-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 sm-mb-30">
                    <div class="feature-text border h-100">
                        <div class="feature-info">
                            <h5 class="text-back">New york</h5>
                            <p> 17504 Carlton Cuevas Rd, MS 39503</p>
                            <p class="mt-15">+(804) 178-1249</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 sm-mb-30">
                    <div class="feature-text border h-100">
                        <div class="feature-info">
                            <h5 class="text-back">London</h5>
                            <p>1234 North Avenue Luke, IN 360001</p>
                            <p class="mt-15">+(905) 379-4349</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 sm-mb-30">
                    <div class="feature-text border h-100">
                        <div class="feature-info">
                            <h5 class="text-back">Paris</h5>
                            <p>44 Shirley Ave. West Chicago, IL 60185</p>
                            <p class="mt-15">+(704) 279-1249</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="contact white-bg page-section-ptb">
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
    </section> --}}
@stop
