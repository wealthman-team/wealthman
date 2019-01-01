<div class="sidebar">
    <form class="js-handle-filter-submit" action="{{ route('roboAdvisors') }}" method="get" role="form" autocomplete="off">
        <div class="sidebar__inner">
            <div class="robo-advisors-filters">
                {{--{{ csrf_field() }}--}}
                <div class="slide-box js-slide-box">
                    <div class="slide-box__header js-slide-box-header">
                        <div class="slide-box__title">
                            General
                        </div>
                        <div class="slide-box__arrow">
                            @svg('arrow-up', 'slide-box__arrow-up')
                        </div>
                    </div>
                    <div class="slide-box__body js-slide-box-body">
                        <div class="form-group">
                            @include('components/rangeSlider', [
                                'min' => 0,
                                'max' => 10,
                                'step' => 0.5,
                                'unit' => '',
                                'label' => 'Rating',
                                'name' => 'rating',
                                'id' => 'rating',
                                'isRange' => true,
                            ])
                        </div>

                        <div class="form-group">
                            @include('components/rangeSlider', [
                                'min' => 0,
                                'max' => 1,
                                'step' => 0.01,
                                'unit' => '',
                                'label' => 'Minimum account',
                                'name' => 'minimum_account',
                                'id' => 'minimum_account',
                                'isRange' => true,
                            ])
                        </div>

                        <div class="form-group">
                            @include('components/rangeSlider', [
                                'min' => 0,
                                'max' => 100,
                                'step' => 0.25,
                                'unit' => '%',
                                'label' => 'Fees',
                                'name' => 'fees',
                                'id' => 'fees',
                                'isRange' => true,
                            ])
                        </div>

                        <div class="form-group">
                            @include('components/rangeSlider', [
                                'min' => 0,
                                'max' => 2,
                                'step' => 0.001,
                                'unit' => 'm',
                                'label' => 'AUM',
                                'name' => 'aum',
                                'id' => 'aum',
                                'isRange' => false,
                            ])
                        </div>

                        <div class="form-group">
                            @include('components/rangeSlider', [
                                'min' => 0,
                                'max' => 2000,
                                'step' => 1,
                                'unit' => '',
                                'label' => 'Number of Users',
                                'name' => 'number_users',
                                'id' => 'number_users',
                                'isRange' => true,
                                'round' => true,
                            ])
                        </div>

                        <div class="form-group">
                            @include('components/rangeSlider', [
                                'min' => 10,
                                'max' => 1000,
                                'step' => 10,
                                'unit' => 'k',
                                'label' => 'Average Account Size',
                                'name' => 'account_size',
                                'id' => 'account_size',
                                'isRange' => true,
                                'round' => true,
                            ])
                        </div>

                        <div class="form-group">
                            @include('components/rangeSlider', [
                                'min' => 2008,
                                'max' => 2018,
                                'step' => 1,
                                'unit' => '',
                                'label' => 'Year Founded',
                                'name' => 'year_founded',
                                'id' => 'year_founded',
                                'isRange' => true,
                                'round' => true,
                            ])
                        </div>
                    </div>
                </div>

                <div class="slide-box js-slide-box">
                    <div class="slide-box__header js-slide-box-header">
                        <div class="slide-box__title">
                            Services
                        </div>
                        <div class="slide-box__arrow">
                            @svg('arrow-up', 'slide-box__arrow-up')
                        </div>
                    </div>
                    <div class="slide-box__body js-slide-box-body">
                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'human_advisors_filter',
                                'name' => 'human_advisors',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="human_advisors_filter">Human Advisors</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'portfolio_rebalancing_filter',
                                'name' => 'portfolio_rebalancing',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="portfolio_rebalancing_filter">Portfolio Rebalancing</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'automatic_deposits_filter',
                                'name' => 'automatic_deposits',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="automatic_deposits_filter">Automatic Deposits</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'factor_authentication_filter',
                                'name' => 'factor_authentication',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="factor_authentication_filter">Two-Factor Authentication</label>
                        </div>
                    </div>
                </div>

                <div class="slide-box js-slide-box">
                    <div class="slide-box__header js-slide-box-header">
                        <div class="slide-box__title">
                            Features
                        </div>
                        <div class="slide-box__arrow">
                            @svg('arrow-up', 'slide-box__arrow-up')
                        </div>
                    </div>
                    <div class="slide-box__body js-slide-box-body">
                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'fractional_shares_filter',
                                'name' => 'fractional_shares',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="fractional_shares_filter">Fractional Shares</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'tax_loss_filter',
                                'name' => 'tax_loss',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="tax_loss_filter">Tax Loss Harvesting</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'assistance_401k_filter',
                                'name' => 'assistance_401k',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="assistance_401k_filter">401k Assistance</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'ira_filter',
                                'name' => 'ira',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="ira_filter">IRA</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'planning_tools_filter',
                                'name' => 'planning_tools',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="planning_tools_filter">Retirement Planning Tools</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'self_clearing_filter',
                                'name' => 'self_clearing',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="self_clearing_filter">Self Clearing</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'smart_beta_filter',
                                'name' => 'smart_beta',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="smart_beta_filter">Smart Beta</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'responsible_investing_filter',
                                'name' => 'responsible_investing',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="responsible_investing_filter">Socially Responsible Investing</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'invests_commodities_filter',
                                'name' => 'invests_commodities',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="invests_commodities_filter">Invests in Commodities</label>
                        </div>

                        <div class="form-group">
                            @include('components/checkbox', [
                                'id' => 'real_estate_filter',
                                'name' => 'real_estate',
                                'inline' => true,
                            ])
                            <label class="label label_inline" for="real_estate_filter">Invests in Real Estate</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar__footer">
            <button class="button button_success" type="submit">Apply</button>
            <button class="button" type="reset">Clear</button>
        </div>
    </form>
</div>