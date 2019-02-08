@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content">
        <div class="blog">
            <div class="container">
                <div class="blog__header-container">
                    @include('components/breadcrumbs', [
                        'theme' => 'dark-theme',
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
                        @include ('blog/_list')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection