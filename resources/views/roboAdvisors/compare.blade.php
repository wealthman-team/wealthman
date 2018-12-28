@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content">
        <div class="compare">
            @include('components/breadcrumbs', [
                'breadcrumbs' => [[
                    'name' => 'Home',
                    'link' => route('home'),
                ],[
                    'name' => 'Compare',
                ]]
            ])

            <div class="container">
                <h1 class="page-header">
                    Comparison of robo advisors
                </h1>
                <div class="page-sub-header">
                    &nbsp;
                    @if (count($roboAdvisors) === 0)
                        Oh, there is nothing here
                    @endif
                </div>

                <div class="compare__container">
                    @if (count($roboAdvisors) === 0)
                        <div class="compare__empty">
                            You can add an robo advisors from the
                            <a class="link link_active" href="#">directory</a>
                        </div>
                    @else
                        <div class="compare__actions-list">
                            <span>Show:</span>
                            <a class="link compare__action-item">Differing сharacteristics</a>
                            <a class="link link_active compare__action-item">All сharacteristics</a>
                            <a class="link link_red compare__action-item">Delete list</a>
                        </div>
                    @endif

                    <div class="compare-list js-compare-list" data-cl-length="{{ count($roboAdvisors) }}">
                        <div class="compare-list__nav">
                            <div class="compare-list__nav-left js-compare-list-prev">@svg('arrow-long-left', 'compare-list__arrow')</div>
                            <div class="compare-list__nav-right js-compare-list-next">@svg('arrow-long-left', 'compare-list__arrow')</div>
                        </div>
                        <div class="compare-list__inner">

                            <div class="compare-list__group js-compare-list-group">
                                <div class="compare-list__row">
                                    <div class="compare-list__context js-compare-list-context">
                                        @foreach ($roboAdvisors as $roboAdvisor)
                                            <div class="compare-list__col compare-list__col_header">
                                                <div class="compare-list__logo">
                                                    @if ($roboAdvisor->logo)
                                                        <img src="{{ asset('storage/' . $roboAdvisor->logo) }}" />
                                                    @endif
                                                </div>
                                                <div class="compare-list__actions">
                                                    <a class="link link_active" href="{{ $roboAdvisor->referral_link }}">Sign up</a>
                                                    <a class="link" href="{{ route('roboAdvisorsShow', $roboAdvisor) }}">Review</a>
                                                    <a class="link" href="#">
                                                        <span class="compare-list__icon-remove">
                                                            @svg('basket')
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="compare-list__group compare-list__group_with-header js-compare-list-group">
                                <div class="compare-list__context js-compare-list-context">
                                    <div class="compare-list__group-header">
                                        <div class="compare-list__group-name js-compare-list-group-name">
                                            GENERAL CHARACTERISTICS
                                            <div class="compare-list__group-arrow">
                                                @svg('arrow-up', 'compare-list__arrow-up')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="compare-list__row compare-list__row_with-hover">
                                    <div class="compare-list__context js-compare-list-context">
                                        <div class="compare-list__row-name js-compare-list-name">
                                            Commission & Fees
                                        </div>
                                        @foreach ($roboAdvisors as $roboAdvisor)
                                            <div class="compare-list__col">
                                                {{ $roboAdvisor->rating->commissions }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="compare-list__row compare-list__row_with-hover">
                                    <div class="compare-list__context js-compare-list-context">
                                        <div class="compare-list__row-name js-compare-list-name">
                                            Customer Service
                                        </div>
                                        @foreach ($roboAdvisors as $roboAdvisor)
                                            <div class="compare-list__col">
                                                {{ $roboAdvisor->rating->service }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection