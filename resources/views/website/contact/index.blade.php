@extends('website.layout')

@section('content')

<section class="contact white-bg page-section-ptb">
    <div class="container">
        <div class="touch-in white-bg">
            <div class="row">
                <div class="col-lg-3 col-md-3 sm-mb-30">
                    <div class="contact-box text-center h-100">
                        <i class="ti-map-alt theme-color"></i>
                        <h5 class="uppercase mt-20">Kota</h5>
                        <p class="mt-20">{{$contact->city}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 sm-mb-30">
                    <div class="contact-box text-center h-100">
                        <i class="ti-map-alt theme-color"></i>
                        <h5 class="uppercase mt-20">Alamat</h5>
                        <p class="mt-20">{{$contact->address}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 sm-mb-30">
                    <div class="contact-box text-center h-100">
                        <i class="ti-mobile theme-color"></i>
                        <h5 class="uppercase mt-20">Telepon</h5>
                        <p class="mt-20"> {{$contact->phone}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 sm-mb-30">
                    <div class="contact-box text-center h-100">
                        <i class="ti-email theme-color"></i>
                        <h5 class="uppercase mt-20">Email</h5>
                        <p class="mt-20">{{$contact->email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <div class="contact-3-info page-section-pt">
                    <div class="clearfix">
                        {!! $contact->g_map !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="contact-3-info page-section-pt">
                    <div class="clearfix">
                        <div class="section-title mb-0">
                            <h6>Mari Bekerja Sama</h6>
                            <h2 class="title-effect">Silahkan Hubungi Kami</h2>
                        </div>
                        <p class="mb-10">Jika anda mempunyai pertanyaan lebih lanjut, Silahkan hubungi kami, kami akan
                            membalas tidak lebih dari
                            <span class="tooltip-content" data-original-title="Senin - Jumat, 9am – 5pm (WIB)"
                                data-toggle="tooltip" data-placement="top"> 24 Jam!</span></p>
                        <div id="formmessage">Success/Error Message Goes Here</div>
                        <form id="form-pesan" role="form">
                            <div class="contact-form clearfix">
                                <div class="section-field">
                                    <input id="name" type="text" placeholder="Nama*" class="form-control" name="name">
                                </div>
                                <div class="section-field">
                                    <input type="email" placeholder="Email*" class="form-control" name="email">
                                </div>
                                <div class="section-field">
                                    <input type="text" placeholder="Telepon*" class="form-control" name="phone">
                                </div>
                                <div class="section-field textarea">
                                    <textarea class="input-message form-control" placeholder="Pesan*" rows="7"
                                        name="description"></textarea>
                                </div>
                                <div class="section-field submit-button">
                                    <button id="submit" name="submit" value="Send" class="button">
                                        <span> Send message </span> <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div id="ajaxloader" style="display:none">
                            <img class="mx-auto mt-30 mb-30 d-block"
                                src="{{ url('website/images/loader/loader-02.svg') }}" alt="loader">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<section class="page-section-pb contact-5">
    <div class="container">
        <div class="row">
            @foreach ($allContact as $c)
            <div class="col-lg-6 col-md-6 sm-mb-30">
                <div class="feature-text border h-100">
                    <div class="feature-info">
                        <h5 class="text-back">{{$c->city}}</h5>
                        <p> {{$c->address}}</p>
                        <p class="mt-15">{{$c->phone}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{$siteKey}}"></script>
<script>
    function recaptcha(){
        grecaptcha.ready(function() {
            grecaptcha.execute('{{$siteKey}}', {
                action: 'pesan'
            }).then(function(token) {
                $('input[name="_token"]').remove();
                $('input[name="g-recaptcha-response"]').remove();
                $('#form-pesan').prepend('<input type="hidden" name="_token" value="{{csrf_token()}}">');
                $('#form-pesan').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');

            });
        });
    }
    $(document).ready(function() {
        recaptcha();
        $("#form-pesan").submit(function(event) {
            event.preventDefault();
            recaptcha();
            $("#ajaxloader").show();
            $("#form-pesan").hide();
            $.ajax({
                url: '{{route('website.contact-us.store')}}',
                data: $(this).serialize(),
                type: 'post',
                success: function(response) {
                    $("#ajaxloader").hide();
                    $("#form-pesan")[0].reset();
                    $("#form-pesan").show();
                    if(response.status === 'success'){
                        $("#formmessage").html('<div class="alert alert-success">' +response.message+ '</div>').show().delay(20000).fadeOut('slow');
                    }else{
                        $("#formmessage").html('<div class="alert alert-danger">' +response.message+ '</div>').show().delay(20000).fadeOut('slow');
                    }
                },
                error: function (response) {
                    let errorMessage = '';
                    errorMessage += "<p>"+response.responseJSON.message + "</p><br>";
                    for (const key in response.responseJSON.errors) {
                        if (response.responseJSON.errors.hasOwnProperty(key)) {
                            const element = response.responseJSON.errors[key];
                            errorMessage += "<p>"+element[0] + "</p><br>";
                        }
                    }
                    $("#ajaxloader").hide();
                    $("#form-pesan")[0].reset();
                    $("#form-pesan").show();
                    $("#formmessage").html('<div class="alert alert-danger">' +errorMessage+ '</div>').show().delay(20000).fadeOut('slow');
                }
            });
        });
    });
</script>
@endsection
