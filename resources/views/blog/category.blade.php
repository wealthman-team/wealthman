@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content blog">

        @include('components/parallax', ['bg' => '/images/header-bg.jpg'])

        <div class="container">
            <div class="topic">
                @include('components/breadcrumbs', [
                    'theme' => 'dark-theme',
                    'breadcrumbs' => [[
                    'name' => 'Home',
                    'link' => route('home'),
                    ],[
                        'name' => 'Blog',
                        'link' => route('blog.index'),
                    ],[
                        'name' => $category->name,
                    ]]
                ])
                @include('components/page-header', [
                   'header' => $category->name,
                   'sub_header' => ''
                ])
            </div>

            <div class="main">
                <div class="main-content">
                    @include ('blog/_filter')

                    <div class="blog__content">
                        @include ('blog/_list')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection