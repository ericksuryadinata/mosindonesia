@extends('website.layout')

@section('content')
<section class="blog blog-single white-bg page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar-widget">
                    <h6 class="mt-40 mb-20">Tulisan Terbaru </h6>
                    @foreach ($recentPosts as $post)
                    <div class="recent-post clearfix">
                        <div class="recent-post-image">
                            <img class="img-fluid" src="{{$post->showImage()}}" alt="">
                        </div>
                        <div class="recent-post-info">
                            <a
                                href="{{route('website.blog.single', ['category' => $post->categoryArticle->slug , 'slug' => $post->slug])}}">{{$post->niceDescription(30)}}</a>
                            <span class="post-category"><a
                                    href="{{route('website.blog.category', ['category' => $post->categoryArticle->slug])}}">{{$post->categoryArticle->name}}</a></span>
                            <span><i class="fas fa-calendar"></i> {{$post->created_at->format('d F, Y')}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">
                <div class="blog-entry mb-10">
                    <div class="section-title line left">
                        <h2 class="title">{{$article->title}}</h2>
                    </div>
                    <div class="entry-image clearfix">
                        <img class="img-fluid" src="{{$article->showImage()}}" alt="">
                    </div>
                    <div class="blog-detail">
                        <div class="entry-meta mb-10">
                            <ul>
                                <li><a href="#"><i class="fas fa-calendar"></i>
                                        {{$article->created_at->format('d M Y')}}</a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            {!!$article->description!!}
                        </div>
                        <div class="entry-share clearfix">
                            {{-- TODO ADD TAGS --}}
                        </div>
                    </div>
                </div>
                <div class="port-navigation clearfix">
                    <div class="port-navigation-left float-left">
                        @if ($article->previousArticle() !== null)
                        <div class="tooltip-content-3" data-original-title="Tulisan Sebelumnya" data-toggle="tooltip"
                            data-placement="right">
                            <a
                                href="{{route('website.blog.single',['category' => $article->previousArticle()->categoryArticle->slug, 'slug' => $article->previousArticle()->slug])}}">
                                <div class="port-photo float-left">
                                    <img src="{{$article->previousArticle()->showImage()}}" alt="">
                                </div>
                                <div class="port-arrow">
                                    <i class="fa fa-angle-left"></i>
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="port-navigation-right float-right">
                        @if ($article->nextArticle() !== null)
                        <div class="tooltip-content-3" data-original-title="Tulisan Selanjutnya" data-toggle="tooltip"
                            data-placement="left">
                            <a
                                href="{{route('website.blog.single',['category' => $article->nextArticle()->categoryArticle->slug, 'slug' => $article->nextArticle()->slug])}}">
                                <div class="port-arrow float-left">
                                    <i class="fa fa-angle-right"></i>
                                </div>
                                <div class="port-photo">
                                    <img src="{{$article->nextArticle()->showImage()}}" alt="">
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="related-work mt-40">
                    <div class="row">
                        <div class="col-ld-12 col-md-12">
                            <h3 class="theme-color mb-20">Tulisan Lainnya</h3>
                            <div class="owl-carousel" data-nav-dots="false" data-items="2" data-xs-items="1"
                                data-xx-items="1">
                                @foreach ($relatedPosts as $post)
                                <div class="item">
                                    <div class="blog-box blog-1 active">
                                        <div class="blog-info">
                                            <span class="post-category"><a href="{{route('website.blog.category',['category' => $post->categoryArticle->slug])}}">{{$post->categoryArticle->name}}</a></span>
                                            <h4> <a href="{{route('website.blog.single',['category' => $post->categoryArticle->slug, 'slug' => $post->slug])}}"> {{$post->title}}</a></h4>
                                            <p>{{$post->niceDescription(50)}}</p>
                                            <span><i class="fas fa-calendar-check"></i> {{$post->created_at->format('d M Y')}} </span>
                                        </div>
                                        <div class="blog-box-img" style="background-image:url({{$post->showImage()}});">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
