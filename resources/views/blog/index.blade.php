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
                        <div class="post-wrapper">
                            @php $idx = 0;$max_idx=6; @endphp
                            @foreach($posts as $post)
                                @php
                                    if($idx === $max_idx){$idx = 0;}
                                    if ($idx === 0) {
                                        $class = 'post__large';
                                    } elseif ($idx < 3) {
                                        $class = 'post__medium';
                                    } else {
                                        $class = 'post__small';
                                    }
                                @endphp
                                <div class="post {{$class}}">
                                    <div class="post__container">
                                        <div class="post__image-box">
                                            <a href="#"><img class="post__image" src="/images/pasted.png" alt=""></a>
                                        </div>
                                        <div class="post__item">
                                            <div class="post__category">
                                                <a href="#">ROBO-ADVISORS REVIEW</a>
                                            </div>
                                            <div class="post__title"><a href="#">Wealthfront uses a team of “world-class financial experts”</a></div>
                                            <div class="post__content">
                                                <a href="#">Wealthfront uses a team of “world-class financial experts” led by legendary economist Burton Malkiel. He’s the author of the investment classic A Random Walk Down Wall Street, which I recommend reading.</a>
                                            </div>
                                            <div class="post__footer">
                                                <div class="post__author">
                                                    <span class="user-icon post__author-icon">ok</span>
                                                    <span class="post__author-name">Anton Okrema</span>
                                                </div>
                                                <div class="post__date">02.10.2019</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php $idx++; @endphp
                            @endforeach


                            {{--<div class="post post__small">--}}
                                {{--<div class="post__container">--}}
                                    {{--<div class="post__image-box">--}}
                                        {{--<img class="post__image" src="/images/pasted.png" alt="">--}}
                                    {{--</div>--}}
                                    {{--<div class="post__item">--}}
                                        {{--<div class="post__category">--}}
                                            {{--<a href="#" class="post__category-link">ROBO-ADVISORS REVIEW</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="post__title">Betterment</div>--}}
                                        {{--<div class="post__content">--}}
                                            {{--Wealthfront uses a team of “world-class financial experts” led by legendary economist Burton Malkiel. He’s the author of the investment classic A Random Walk Down Wall Street, which I recommend reading.--}}
                                        {{--</div>--}}
                                        {{--<div class="post__footer">--}}
                                            {{--<div class="post__author">--}}
                                                {{--<span class="user-icon post__author-icon">ok</span>--}}
                                                {{--<span class="post__author-name">Anton Okrema</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="post__date">02.10.2019</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="post post__small">--}}
                                {{--<div class="post__container">--}}
                                    {{--<div class="post__image-box">--}}
                                        {{--<img class="post__image" src="/images/pasted.png" alt="">--}}
                                    {{--</div>--}}
                                    {{--<div class="post__item">--}}
                                        {{--<div class="post__category">--}}
                                            {{--<a href="#" class="post__category-link">ROBO-ADVISORS REVIEW</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="post__title">Betterment</div>--}}
                                        {{--<div class="post__content">--}}
                                            {{--Wealthfront uses a team of “world-class financial experts” led by legendary economist Burton Malkiel. He’s the author of the investment classic A Random Walk Down Wall Street, which I recommend reading.--}}
                                        {{--</div>--}}
                                        {{--<div class="post__footer">--}}
                                            {{--<div class="post__author">--}}
                                                {{--<span class="user-icon post__author-icon">ok</span>--}}
                                                {{--<span class="post__author-name">Anton Okrema</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="post__date">02.10.2019</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="post post__small">--}}
                                {{--<div class="post__container">--}}
                                    {{--<div class="post__image-box">--}}
                                        {{--<img class="post__image" src="/images/pasted.png" alt="">--}}
                                    {{--</div>--}}
                                    {{--<div class="post__item">--}}
                                        {{--<div class="post__category">--}}
                                            {{--<a href="#" class="post__category-link">ROBO-ADVISORS REVIEW</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="post__title">Betterment</div>--}}
                                        {{--<div class="post__content">--}}
                                            {{--Wealthfront uses a team of “world-class financial experts” led by legendary economist Burton Malkiel. He’s the author of the investment classic A Random Walk Down Wall Street, which I recommend reading.--}}
                                        {{--</div>--}}
                                        {{--<div class="post__footer">--}}
                                            {{--<div class="post__author">--}}
                                                {{--<span class="user-icon post__author-icon">ok</span>--}}
                                                {{--<span class="post__author-name">Anton Okrema</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="post__date">02.10.2019</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="post post__medium">--}}
                                {{--<div class="post__container">--}}
                                    {{--<div class="post__image-box">--}}
                                        {{--<img class="post__image" src="/images/pasted.png" alt="">--}}
                                    {{--</div>--}}
                                    {{--<div class="post__item">--}}
                                        {{--<div class="post__category">--}}
                                            {{--<a href="#" class="post__category-link">ROBO-ADVISORS REVIEW</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="post__title">Wealthfront uses a team of “world-class financial experts”</div>--}}
                                        {{--<div class="post__content">--}}
                                            {{--Wealthfront uses a team of “world-class financial experts” led by legendary economist Burton Malkiel. He’s the author of the investment classic A Random Walk Down Wall Street, which I recommend reading.--}}
                                        {{--</div>--}}
                                        {{--<div class="post__footer">--}}
                                            {{--<div class="post__author">--}}
                                                {{--<span class="user-icon post__author-icon">ok</span>--}}
                                                {{--<span class="post__author-name">Anton Okrema</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="post__date">02.10.2019</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="post post__medium">--}}
                                {{--<div class="post__container">--}}
                                    {{--<div class="post__image-box">--}}
                                        {{--<img class="post__image" src="/images/pasted.png" alt="">--}}
                                    {{--</div>--}}
                                    {{--<div class="post__item">--}}
                                        {{--<div class="post__category">--}}
                                            {{--<a href="#" class="post__category-link">ROBO-ADVISORS REVIEW</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="post__title">Wealthfront uses a team of “world-class financial experts”</div>--}}
                                        {{--<div class="post__content">--}}
                                            {{--Wealthfront uses a team of “world-class financial experts” led by legendary economist Burton Malkiel. He’s the author of the investment classic A Random Walk Down Wall Street, which I recommend reading.--}}
                                        {{--</div>--}}
                                        {{--<div class="post__footer">--}}
                                            {{--<div class="post__author">--}}
                                                {{--<span class="user-icon post__author-icon">ok</span>--}}
                                                {{--<span class="post__author-name">Anton Okrema</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="post__date">02.10.2019</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
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