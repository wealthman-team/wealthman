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