<section class="marketing-service gray-bg page-section-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2 class="title"><span class="theme-bg">LAYANAN</span> MOS INDONESIA</h2>
                    <p>Percayakan kebutuhan IT anda kepada kami</p>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            @foreach ($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="feature-text left-icon">
                    <div class="position-relative clearfix">
                        <div class="feature-icon">
                            <span class="{{$service->showIcon()}}"></span>
                        </div>
                    </div>
                    <div class="feature-info">
                        <h5 class="text-back">{{$service->title}}</h5>
                        <p class="mb-0">{{$service->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- TODO: CTA ACTIONS HERE --}}
    </div>
</section>
