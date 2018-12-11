@extends('admin/layouts/admin')

@section('content')

    @if (session('status'))
        @include('components/noty', [
            'type' => session('statusType'),
            'text' => session('status'),
        ])
    @endif

    <div class="content">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">Add new Robo Advisor</h3>
                    </div>

                    <form action="{{ route('admin.roboAdvisors.store') }}" method="post" enctype="multipart/form-data" role="form" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab-robo-advisor-main-info" data-toggle="tab" aria-expanded="true">Main</a>
                                    </li>
                                    <li>
                                        <a href="#tab-robo-advisor-rating" data-toggle="tab" aria-expanded="false">Rating</a>
                                    </li>
                                    <li>
                                        <a href="#tab-robo-advisor-contacts" data-toggle="tab" aria-expanded="false">Contacts</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-robo-advisor-main-info">
                                        {{-- Robo Advisor name --}}
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-name-input">Name*</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-name-input" type="text" name="name" value="{{ old('name') }}">
                                            </div>

                                            @if ($errors->has('name'))
                                                <span class="help-block">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor verify property --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-is-verify-input">
                                                    <input class="js-icheck" id="robo-advisor-is-verify-input" name="verify" type="checkbox" {{ old('is_verify') ? 'checked' : '' }} >
                                                    Verify
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor logo --}}
                                        <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-logo-input">Robo Advisor logo</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-upload"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-logo-input" type="file" name="logo">
                                            </div>

                                            @if ($errors->has('logo'))
                                                <span class="help-block">{{ $errors->first('logo') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor title --}}
                                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-title-input">Title</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-title-input" type="text" name="title" value="{{ old('title') }}">
                                            </div>

                                            @if ($errors->has('title'))
                                                <span class="help-block">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor short description --}}
                                        <div class="form-group {{ $errors->has('short_description') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-short-description-input">Short description</label>
                                            <textarea class="form-control js-editor" id="robo-advisor-short-description-input" name="short_description">{{ old('short_description') }}</textarea>

                                            @if ($errors->has('short_description'))
                                                <span class="help-block">{{ $errors->first('short_description') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor description --}}
                                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-description-input">Description</label>
                                            <textarea class="form-control js-editor" id="robo-advisor-description-input" name="description">{{ old('description') }}</textarea>

                                            @if ($errors->has('description'))
                                                <span class="help-block">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor referral link --}}
                                        <div class="form-group {{ $errors->has('referral_link') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-referral-link-input">Referral link</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-link"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-referral-link-input" type="text" name="referral_link" value="{{ old('referral_link') }}">
                                            </div>

                                            @if ($errors->has('referral_link'))
                                                <span class="help-block">{{ $errors->first('referral_link') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor video link --}}
                                        <div class="form-group {{ $errors->has('video_link') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-video-link-input">Video link</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-link"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-video-link-input" type="text" name="video_link" value="{{ old('video_link') }}">
                                            </div>

                                            @if ($errors->has('video_link'))
                                                <span class="help-block">{{ $errors->first('video_link') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor minimum account --}}
                                        <div class="form-group {{ $errors->has('minimum_account') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-minimum-account-input">Minimum account</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-minimum-account-input" type="text" name="minimum_account" value="{{ old('minimum_account') }}">
                                            </div>

                                            @if ($errors->has('minimum_account'))
                                                <span class="help-block">{{ $errors->first('minimum_account') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor management fee --}}
                                        <div class="form-group {{ $errors->has('management_fee') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-management-fee-input">Management fee</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-management-fee-input" type="text" name="management_fee" value="{{ old('management_fee') }}">
                                            </div>

                                            @if ($errors->has('management_fee'))
                                                <span class="help-block">{{ $errors->first('management_fee') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor fee details --}}
                                        <div class="form-group {{ $errors->has('fee_details') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-fee-details-input">Fee details</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-fee-details-input" type="text" name="fee_details" value="{{ old('fee_details') }}">
                                            </div>

                                            @if ($errors->has('fee_details'))
                                                <span class="help-block">{{ $errors->first('fee_details') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor aum --}}
                                        <div class="form-group {{ $errors->has('aum') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-aum-input">Assets Under Management</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-aum-input" type="text" name="aum" value="{{ old('aum') }}">
                                            </div>

                                            @if ($errors->has('aum'))
                                                <span class="help-block">{{ $errors->first('aum') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor promotions --}}
                                        <div class="form-group {{ $errors->has('promotions') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-promotions-input">Promotions</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-promotions-input" type="text" name="promotions" value="{{ old('promotions') }}">
                                            </div>

                                            @if ($errors->has('promotions'))
                                                <span class="help-block">{{ $errors->first('promotions') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor human advisors --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-human-advisors-input">
                                                    <input class="js-icheck" id="robo-advisor-human-advisors-input" name="human_advisors" type="checkbox" {{ old('human_advisors') ? 'checked' : '' }} >
                                                    Human advisors
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor human advisors details --}}
                                        <div class="form-group {{ $errors->has('human_advisors_details') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-human-advisors-details-input">Additional information about human advisors</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-human-advisors-details-input" type="text" name="human_advisors_details" value="{{ old('human_advisors_details') }}">
                                            </div>

                                            @if ($errors->has('human_advisors_details'))
                                                <span class="help-block">{{ $errors->first('human_advisors_details') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor assistance 401k --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-assistance-401k-input">
                                                    <input class="js-icheck" id="robo-advisor-assistance-401k-input" name="assistance_401k" type="checkbox" {{ old('assistance_401k') ? 'checked' : '' }} >
                                                    401k Assistance
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor tax loss --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-tax-loss-input">
                                                    <input class="js-icheck" id="robo-advisor-tax-loss-input" name="tax_loss" type="checkbox" {{ old('tax_loss') ? 'checked' : '' }} >
                                                    Tax Loss Harvesting
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor tax loss details --}}
                                        <div class="form-group {{ $errors->has('tax_loss_details') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-tax-loss-details-input">Additional information about tax Loss Harvesting</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-tax-loss-details-input" type="text" name="tax_loss_details" value="{{ old('tax_loss_details') }}">
                                            </div>

                                            @if ($errors->has('tax_loss_details'))
                                                <span class="help-block">{{ $errors->first('tax_loss_details') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor portfolio rebalancing --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-portfolio-rebalancing-input">
                                                    <input class="js-icheck" id="robo-advisor-portfolio-rebalancing-input" name="portfolio_rebalancing" type="checkbox" {{ old('portfolio_rebalancing') ? 'checked' : '' }} >
                                                    Portfolio Rebalancing
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor retirement planning --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-retirement-planning-input">
                                                    <input class="js-icheck" id="robo-advisor-retirement-planning-input" name="retirement_planning" type="checkbox" {{ old('retirement_planning') ? 'checked' : '' }} >
                                                    Retirement Planning Tools
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor automatic deposits --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-automatic-deposits-input">
                                                    <input class="js-icheck" id="robo-advisor-automatic-deposits-input" name="automatic_deposits" type="checkbox" {{ old('automatic_deposits') ? 'checked' : '' }} >
                                                    Automatic Deposits
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor clearing agency --}}
                                        <div class="form-group {{ $errors->has('clearing_agency') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-clearing-agency-input">Clearing Agency</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-clearing-agency-input" type="text" name="clearing_agency" value="{{ old('clearing_agency') }}">
                                            </div>

                                            @if ($errors->has('clearing_agency'))
                                                <span class="help-block">{{ $errors->first('clearing_agency') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor self clearing --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-self-clearing-input">
                                                    <input class="js-icheck" id="robo-advisor-self-clearing-input" name="self_clearing" type="checkbox" {{ old('self_clearing') ? 'checked' : '' }} >
                                                    Self Clearing
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor smart beta --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-smart-beta-input">
                                                    <input class="js-icheck" id="robo-advisor-smart-beta-input" name="smart_beta" type="checkbox" {{ old('smart_beta') ? 'checked' : '' }} >
                                                    Smart Beta
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor responsible investing --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-responsible-investing-input">
                                                    <input class="js-icheck" id="robo-advisor-responsible-investing-input" name="responsible_investing" type="checkbox" {{ old('responsible_investing') ? 'checked' : '' }} >
                                                    Socially Responsible Investing
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor invests commodities --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-invests-commodities-input">
                                                    <input class="js-icheck" id="robo-advisor-invests-commodities-input" name="invests_commodities" type="checkbox" {{ old('invests_commodities') ? 'checked' : '' }} >
                                                    Invests in Commodities
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor real estate --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-real-estate-input">
                                                    <input class="js-icheck" id="robo-advisor-real-estate-input" name="real_estate" type="checkbox" {{ old('real_estate') ? 'checked' : '' }} >
                                                    Invests in Real Estate
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor fractional shares --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-fractional-shares-input">
                                                    <input class="js-icheck" id="robo-advisor-fractional-shares-input" name="fractional_shares" type="checkbox" {{ old('fractional_shares') ? 'checked' : '' }} >
                                                    Fractional Shares
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor access platforms --}}
                                        <div class="form-group {{ $errors->has('access_platforms') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-access-platforms-input">Access platforms</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-access-platforms-input" type="text" name="access_platforms" value="{{ old('access_platforms') }}">
                                            </div>

                                            @if ($errors->has('access_platforms'))
                                                <span class="help-block">{{ $errors->first('access_platforms') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor two factor auth --}}
                                        <div class="form-group">
                                            <div class="checkbox icheck">
                                                <label for="robo-advisor-two-factor-auth-input">
                                                    <input class="js-icheck" id="robo-advisor-two-factor-auth-input" name="two_factor_auth" type="checkbox" {{ old('two_factor_auth') ? 'checked' : '' }} >
                                                    Two-Factor Authentication
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Robo Advisor customer service --}}
                                        <div class="form-group {{ $errors->has('customer_service') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-customer-service-input">Customer Service</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-customer-service-input" type="text" name="customer_service" value="{{ old('customer_service') }}">
                                            </div>

                                            @if ($errors->has('customer_service'))
                                                <span class="help-block">{{ $errors->first('customer_service') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor number accounts --}}
                                        <div class="form-group {{ $errors->has('number_accounts') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-number-accounts-input">Number of Accounts</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-number-accounts-input" type="text" name="number_accounts" value="{{ old('number_accounts') }}">
                                            </div>

                                            @if ($errors->has('number_accounts'))
                                                <span class="help-block">{{ $errors->first('number_accounts') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor average account size --}}
                                        <div class="form-group {{ $errors->has('average_account_size') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-average-account-size-input">Average Account Size</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-average-account-size-input" type="text" name="average_account_size" value="{{ old('average_account_size') }}">
                                            </div>

                                            @if ($errors->has('average_account_size'))
                                                <span class="help-block">{{ $errors->first('average_account_size') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor additional information --}}
                                        <div class="form-group {{ $errors->has('additional_information') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-additional-information-input">Additional information</label>
                                            <textarea class="form-control js-editor" id="robo-advisor-additional-information-input" name="additional_information">{{ old('additional_information') }}</textarea>

                                            @if ($errors->has('additional_information'))
                                                <span class="help-block">{{ $errors->first('additional_information') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab-robo-advisor-rating">

                                    </div>

                                    <div class="tab-pane" id="tab-robo-advisor-contacts">
                                        {{-- Robo Advisor headquarters --}}
                                        <div class="form-group {{ $errors->has('headquarters') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-headquarters-input">Headquarters</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-headquarters-input" type="text" name="headquarters" value="{{ old('headquarters') }}">
                                            </div>

                                            @if ($errors->has('headquarters'))
                                                <span class="help-block">{{ $errors->first('headquarters') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor founded --}}
                                        <div class="form-group {{ $errors->has('founded') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-founded-input">Year Founded</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-founded-input" type="text" name="founded" value="{{ old('founded') }}">
                                            </div>

                                            @if ($errors->has('founded'))
                                                <span class="help-block">{{ $errors->first('founded') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor site url --}}
                                        <div class="form-group {{ $errors->has('site_url') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-site-url-input">Site url</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-link"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-site-url-input" type="text" name="site_url" value="{{ old('site_url') }}">
                                            </div>

                                            @if ($errors->has('site_url'))
                                                <span class="help-block">{{ $errors->first('site_url') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor phone --}}
                                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-phone-input">Phone</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-phone-input" type="text" name="phone" value="{{ old('phone') }}">
                                            </div>

                                            @if ($errors->has('phone'))
                                                <span class="help-block">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor ceo --}}
                                        <div class="form-group {{ $errors->has('ceo') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-ceo-input">CEO</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-ceo-input" type="text" name="ceo" value="{{ old('ceo') }}">
                                            </div>

                                            @if ($errors->has('ceo'))
                                                <span class="help-block">{{ $errors->first('ceo') }}</span>
                                            @endif
                                        </div>

                                        {{-- Robo Advisor contact details --}}
                                        <div class="form-group {{ $errors->has('contact_details') ? ' has-error' : '' }}">
                                            <label for="robo-advisor-contact-details-input">More data</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control" id="robo-advisor-contact-details-input" type="text" name="contact_details" value="{{ old('contact_details') }}">
                                            </div>

                                            @if ($errors->has('contact_details'))
                                                <span class="help-block">{{ $errors->first('contact_details') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i>
                                <span>Add</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection