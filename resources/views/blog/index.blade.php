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
                    ]]
                ])
                @include('components/page-header', [
                   'header' => 'Blog',
                   'sub_header' => 'Follow us'
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