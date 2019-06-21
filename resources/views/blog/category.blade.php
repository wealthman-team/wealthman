@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content blog">

        @include('components/parallax', ['bg' => '/images/header-bg.jpg', 'hidden_stock' => true])

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
                    @if(count($posts) > 0)
                        @include ('blog/_filter')
                    @endif

                    @include ('blog/_list')
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection