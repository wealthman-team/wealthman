@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content">
        <div class="blog">
            <div class="container">
                <div class="blog__header-container">
                    @include('components/breadcrumbs', [
                        'breadcrumbs' => [[
                        'name' => 'Home',
                        'link' => route('home'),
                        ],[
                            'name' => 'Blog',
                        ]]
                    ])
                    <h1 class="page-header">
                        Blog
                    </h1>
                    <div class="page-sub-header">
                        Follow us
                    </div>
                </div>

                <div class="blog__container">
                    @if(count($posts) > 0)
                        <ul class="filter-articles">
                            <li class="filter-articles__item">
                                <a href="#" class="filter-articles__link active">All Articles </a>
                            </li>
                            <li class="filter-articles__item">
                                <a href="#" class="filter-articles__link">Robo-Advisors Review <span class="filter-articles__count">(10)</span></a>
                            </li>
                            <li class="filter-articles__item">
                                <a href="#" class="filter-articles__link">Company News <span class="filter-articles__count">(10)</span></a>
                            </li>
                            <li class="filter-articles__item">
                                <a href="#" class="filter-articles__link">Useful Article <span class="filter-articles__count">(10)</span></a>
                            </li>
                        </ul>
                    @else
                        <ul class="filter-articles">
                            <li class="filter-articles__item">
                                <span class="filter-articles__link">Not found articles</span>
                            </li>
                        </ul>
                    @endif
                    <div class="blog__content">
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                @if (($loop->index % 6) === 0 || ($loop->index % 6) === 1 || ($loop->index % 6) === 4)
                                    <div class="post-row">
                                @endif
                                <div class="post {{post_class($loop->index)}}">
                                    <div class="post__container">
                                        <div class="post__image-box">
                                            <a href="#">
                                                @if ($post->getFirstMedia('images'))
                                                    <img class="post__image" src="{{ $post->getFirstMedia('images')->getUrl() }}" alt="{{ $post->getFirstMedia('images')->name }}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="post__item">
                                            <div class="post__item-text">
                                                <div class="post__category">
                                                    <a href="#">ROBO-ADVISORS REVIEW</a>
                                                </div>
                                                <div class="post__title">
                                                    <a href="#">{{$post->title}}</a>
                                                </div>
                                                <div class="post__content">
                                                    <a href="#">{{$post->content}}</a>
                                                </div>
                                            </div>
                                            <div class="post__footer">
                                                <div class="post__author">
                                                    <span class="user-icon post__author-icon">ok</span>
                                                    <span class="post__author-name">Anton Okrema</span>
                                                </div>
                                                <div class="post__date">{{humanize_date($post->published_at, 'd.m.Y')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($loop->last || $loop->index % 6 === 0 || ($loop->index % 6) === 3 || ($loop->index % 6) === 5)
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="post-wrapper">
                                <div class="post post__large">
                                    <div class="post__container">
                                        <div class="post__empty">
                                            <span>There is no post for the moment.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection