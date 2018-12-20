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

                    <div class="robo-advisors__list js-ra-list">
                        <div class="robo-advisors__list-header">
                            <div class="robo-advisors__lh-item robo-advisors__lh-company">
                                Company
                            </div>
                            <div class="robo-advisors__lh-item robo-advisors__lh-rating">
                                Rating
                            </div>
                            <div class="robo-advisors__lh-item robo-advisors__lh-recommendation">
                                Recommendation
                            </div>
                            <div class="robo-advisors__lh-item robo-advisors__lh-account">
                                Min account
                            </div>
                            <div class="robo-advisors__lh-item robo-advisors__lh-fee">
                                Fee
                            </div>
                            <div class="robo-advisors__lh-item robo-advisors__lh-aum">
                                AUM
                            </div>
                            <div class="robo-advisors__lh-item robo-advisors__lh-details">
                                Additional details
                            </div>
                        </div>
                        <div class="robo-advisors__list-body">
                            @include('components/roboAdvisorsItem')
                            @include('components/roboAdvisorsItem')
                            @include('components/roboAdvisorsItem')
                            @include('components/roboAdvisorsItem')
                            @include('components/roboAdvisorsItem')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection