@extends('website.layout')

@section('content')
    <section class="service white-bg page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h6>Kami Hebat Dalam </h6>
                        <h2 class="title-effect">Layanan Kami</h2>
                        <p>Kita akan melakukan yang terbaik yang kita bisa untuk menghadirkan layanan terbaik</p>
                    </div>


                </div>
            </div>
            <!-- =========================================== -->
            <div class="row">
                @foreach ($services as $service)
                <div class="col-lg-4 col-md-4 mb-30">
                    <div class="feature-text box-shadow h-100 text-center">
                        <div class="feature-icon">
                            <span class="{{$service->icon}}"></span>
                        </div>
                        <div class="feature-info">
                            <h4 class="pb-10">{{$service->title}}</h5>
                            <p>{{$service->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="col-lg-4 col-md-4 mb-30">
                    <div class="feature-text box-shadow h-100 text-center">
                        <div class="feature-icon">
                            <span class="ti-layers-alt theme-color"></span>
                        </div>
                        <div class="feature-info">
                            <h4 class="pb-10">Many Style Available</h4>
                            <p>Vero quod conseqt quibusdam, sed quia nesciunt in accusamus necessitatibus modi adipisci
                                officia dolor sit amet, consectetur adipisicing elit. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mb-30">
                    <div class="feature-text box-shadow h-100 text-center">
                        <div class="feature-icon">
                            <span aria-hidden="true" class="ti-image theme-color"></span>
                        </div>
                        <div class="feature-info">
                            <h4 class="pb-10">Revolution Slider</h4>
                            <p>Sed quia nesciunt in accusamus necessitatibus modi adipisci officia dolor sit amet,
                                consectetur adipisicing elit. Vero quod conseqt quibusdam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mb-30">
                    <div class="feature-text box-shadow h-100 text-center">
                        <div class="feature-icon">
                            <span aria-hidden="true" class="ti-heart theme-color"></span>
                        </div>
                        <div class="feature-info">
                            <h4 class="pb-10">Blog Options</h4>
                            <p>Quibusdam dolor sit amet, consectetur adipisicing elit. Vero quod conseqt, sed quia nesciunt
                                in accusamus necessitatibus modi adipisci</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="row">
                <div class="col-lg-4 col-md-4 xs-mb-30">
                    <div class="feature-text box-shadow h-100 text-center">
                        <div class="feature-icon">
                            <span aria-hidden="true" class="ti-split-v theme-color"></span>
                        </div>
                        <div class="feature-info">
                            <h4 class="pb-10">Parallax Sections</h4>
                            <p>Sed quia nesciunt in accusamus necessitatibus modi adipisci officia dolor sit amet,
                                consectetur adipisicing elit. Vero quod conseqt quibusdam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 xs-mb-30">
                    <div class="feature-text box-shadow h-100 text-center">
                        <div class="feature-icon">
                            <span aria-hidden="true" class="ti-paint-bucket theme-color"></span>
                        </div>
                        <div class="feature-info">
                            <h4 class="pb-10">Unlimited Colors</h4>
                            <p>Accusamus necessitatibus modi adipisci officia dolor sit amet, consectetur adipisicing elit.
                                Vero quod conseqt quibusdam, sed quia nesciunt in.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="feature-text box-shadow h-100 text-center">
                        <div class="feature-icon">
                            <span aria-hidden="true" class="ti-html5 theme-color"></span>
                        </div>
                        <div class="feature-info">
                            <h4 class="pb-10">HTML5 and CSS3</h4>
                            <p>Adipisicing dolor sit amet, consectetur elit. Vero quod conseqt quibusdam, sed quia nesciunt
                                in accusamus necessitatibus modi officia</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection
