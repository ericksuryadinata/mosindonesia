@extends('website.layout')

@section('content')
    <section class="blog blog-grid-3-column white-bg page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="title">{{$categoryArticle->name}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($articles as $article)
                <div class="col-lg-4 col-md-4">
                    <div class="blog-entry mb-50">
                        <div class="entry-image clearfix">
                            <img class="img-fluid" src="{{$article->showImage()}}" alt="">
                        </div>
                        <div class="blog-detail">
                            <div class="entry-title mb-10">
                                <a href=""{{route('website.blog.single',['category' => $categoryArticle->slug, 'slug' => $article->slug])}}"">{{$article->title}}</a>
                            </div>
                            <div class="entry-meta mb-10">
                                <ul>
                                    {{-- TODO ADD TAG POST --}}
                                    <li><a href="#"><i class="fas fa-calendar"></i>{{$article->created_at->format('Y-m-d')}}</a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>{{$article->niceDescription(100)}}</p>
                            </div>
                            <div class="entry-share clearfix">
                                <div class="entry-button">
                                    <a class="button arrow" href="{{route('website.blog.single',['category' => $categoryArticle->slug, 'slug' => $article->slug])}}">Read More<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12 col-lg-12">
                    <div class="entry-pagination">
                        <nav aria-label="Page navigation example text-center">
                            {{$articles->links('vendor.pagination.webster')}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
