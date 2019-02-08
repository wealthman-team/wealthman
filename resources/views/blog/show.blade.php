@extends('layouts.app')

@section('content')
    @include('layouts/header')
    <div class="content">
        <div class="blog-post">
            <div class="container">
                <div class="blog-post__header-container">
                    @include('components/breadcrumbs', [
                        'theme' => 'dark-theme',
                        'breadcrumbs' => [[
                            'name' => 'Home',
                            'link' => route('home'),
                        ],[
                            'name' => 'Blog',
                            'link' => route('blog.index'),
                        ],[
                            'name' => $post->title
                        ]]
                    ])
                    <h1 class="page-header">
                        {{$post->title}}
                    </h1>
                </div>

                <div class="main blog-post__container">
                    <div class="sidebar">
                        @include ('blog/_sidebar')
                    </div>
                    <div class="main-content">
                        <div class="panel panel_padding blog-post__panel">
                            <div class="blog-post__image-box">
                                <img class="blog-post__image" src="{{ $post->getFirstMedia('images')->getUrl() }}" alt="">
                            </div>
                            <div class="blog-post__info">
                                <div class="blog-post__info-part">
                                    <span class="user-icon user-icon__small">ok</span>
                                    <span class="blog-post__author-name">Anton Okrema</span>
                                    <span class="blog-post__date">{{humanize_date($post->published_at, 'd.m.Y')}}</span>
                                </div>
                                <div class="blog-post__info-part">ROBO-ADVISORS REVIEW</div>
                            </div>
                            <div class="panel panel_white">
                                <div class="reach-text">
                                    <div class="blog-post__content">
                                        {!! $post->content_html !!}
                                    </div>
                                </div>
                            </div>
                            <ul class="share">
                                <li class="share-item share-item__title">
                                    Share:
                                </li>
                                <li class="share-item"><a href="#">@svg('sh-tel', 'share__tel')</a></li>
                                <li class="share-item"><a href="#">@svg('sh-bit', 'share__bit')</a></li>
                                <li class="share-item"><a href="#">@svg('sh-fac', 'share__fac')</a></li>
                                <li class="share-item"><a href="#">@svg('sh-ins', 'share__ins')</a></li>
                                <li class="share-item"><a href="#">@svg('sh-red', 'share__red')</a></li>
                                <li class="share-item"><a href="#">@svg('sh-twit', 'share__twit')</a></li>
                                <li class="share-item"><a href="#">@svg('sh-lin', 'share__lin')</a></li>
                            </ul>
                        </div>
                        <div class="popular-posts">
                            @include ('blog/_popular')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection