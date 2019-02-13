@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content blog blog-search">
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
                        <div class="blog__content">
                            <div class="post__empty">
                                <div class="post__empty-message">
                                    <h3 class="h3" style="padding-top: 0">Nothing found.</h3>
                                    Try changing your search terms.
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection