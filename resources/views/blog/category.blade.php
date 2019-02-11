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
                            'link' => route('blog.index'),
                        ],[
                            'name' => $category->name,
                        ]]
                    ])
                    <h1 class="page-header">
                        {{$category->name}}
                    </h1>
                </div>

                <div class="blog__container">
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