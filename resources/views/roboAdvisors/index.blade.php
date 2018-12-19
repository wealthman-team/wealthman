@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content">
        <div class="robo-advisors">
            @include('components/breadcrumbs', [
                'breadcrumbs' => [[
                    'name' => 'Home',
                    'link' => route('home'),
                ],[
                    'name' => 'Robo Advisors',
                ]]
            ])

            <div class="container">
                <h1 class="page-header">
                    Directory of Robo Advisors
                </h1>
                <div class="page-sub-header">
                    Find independent information about
                    roboadvisors in the USA
                </div>

                <div class="robo-advisors__content">
                    @include('components/roboAdvisorsFilters')

                    <div class="robo-advisors__list">

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection