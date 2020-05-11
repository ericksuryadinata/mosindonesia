<section class="page-section-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2 class="title"><span class="theme-bg">TULISAN</span> TERBARU</h2>
                </div>
            </div>
        </div>
        <div class="row {{count($articles) == 0 ? 'justify-content-center' : ''}}">
            @forelse ($articles as $article)
            @if ($article->headline)
            <div class="col-lg-6 col-sm-6 mb-30">
                <div class="blog-overlay">
                    <div class="blog-image">
                        <img class="img-fluid" src="{{$article->showImage()}}" alt="">
                    </div>
                    <div class="blog-name">
                        <a class="tag" href="#">{{$article->categoryArticle->name}}</a>
                        <h4 class="mt-15 text-white"><a href="#">{{$article->title}}</a></h4>
                        <p class="mb-0">{{$article->niceDescription(20)}}</p>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-sm-6 mb-30">
                <div class="blog-box blog-2 border">
                    <img class="img-fluid" src="{{$article->showImage()}}" alt="">
                    <div class="blog-info  p-3">
                        <span class="post-category"><a class="mb-10"
                                href="#">{{$article->categoryArticle->name}}</a></span>
                        <h4> <a href="#"> {{$article->title}}</a></h4>
                        <p class="mb-0">{{$article->niceDescription(20)}}</p>
                        <span><i class="fa fa-calendar-check-o"></i> {{$article->created_at}} </span>
                    </div>
                </div>
            </div>
            @endif
            @empty
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2 class="title">TIDAK ADA TULISAN TERBARU</h2>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
