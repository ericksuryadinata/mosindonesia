<footer class="footer page-section-pt black-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 sm-mb-30">
                <div class="footer-logo">
                    <img id="logo-footer" class="mb-20" src="{{ asset($setting->showlogo()) }}" alt="{{$setting->title}}">
                    <p class="pb-10"> {!!$setting->description!!}</p>
                </div>
                <div class="social-icons color-hover">
                    <ul>
                        @foreach($socialMedia as $social_media)
                        <li class="social-{{$social_media->type}}"><a href="{{ $social_media->url }}" target="_blank"><span class="fab fa-{{ $social_media->type }}"></span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h6 class="text-white mb-30 mt-10 text-uppercase">Kontak Kami</h6>
                <ul class="addresss-info">
                    <li><i class="fa fa-map-marker"></i>
                        <p>Alamat : {{$contact->address}}</p>
                    </li>
                    <li><i class="fa fa-mobile-alt"></i> <a href="tel:{{$contact->phone}}"> <span>{{$contact->phone}}</span> </a> </li>
                    <li><i class="far fa-envelope"></i>Email: {{$contact->email}}</li>
                </ul>
            </div>
        </div>
        <div class="footer-widget mt-20">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mt-15"> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()));</script></span><a href="#"> MOS INDONESIA </a> All Rights Reserved </p>
                </div>
            </div>
        </div>
    </div>
</footer>
