@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content blog blog-search">

        @include('components/parallax', ['bg' => '/images/header-bg3.jpg', 'hidden_stock' => true])

        <div class="container">
            <div class="topic">
                @include('components/breadcrumbs', [
                    'theme' => 'dark-theme',
                    'breadcrumbs' => [[
                        'name' => 'Home',
                        'link' => route('home'),
                    ],[
                        'name' => 'Search',
                    ]]
                ])
                @include('components/page-header', [
                    'header' => 'SEARCH RESULTS FOR:',
                    'sub_header' => $search ? $search :''
                ])
            </div>

            <div class="main">
                <div class="main-content">
                    @if($search && count($posts) > 0)
                        @include ('blog/_filter')

                        <div class="blog__content">
                            @include ('blog/_list')
                        </div>
                    @else
                        <div class="empty-message">
                            Nothing found. Try changing your search terms.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection