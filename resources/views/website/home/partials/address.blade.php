<section class="page-section-pb white-bg">
    <div class="container">
        <div class="row">
            @foreach ($contacts as $contact)
            <div class="col-lg-6 col-sm-6 sm-mb-30 {{$loop->last ? '' : 'border-right'}} pl-40">
                <h4 class="mb-20">{{$contact->city}}</h4>
                <ul class="addresss-info text-black">
                    <li><i class="fa fa-map-marker-alt"></i>
                        <p>{{$contact->address}}</p>
                    </li>
                    <li><i class="fa fa-mobile-alt"></i> <a href="tel:{{$contact->phone}}"> <span>{{$contact->phone}} </span> </a>
                    </li>
                    <li><i class="far fa-envelope"></i>{{$contact->email}}</li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>
