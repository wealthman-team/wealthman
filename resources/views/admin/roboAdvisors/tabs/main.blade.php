{{-- Robo Advisor name --}}
<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="robo-advisor-name-input">Name*</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="robo-advisor-name-input" type="text" name="name" value="{{ old('name') ?? $roboAdvisor->name ??  ''}}">
    </div>

    @if ($errors->has('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div>
@if (isset($roboAdvisor))
    <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
        <label for="robo-advisor-slug-input">Slug*</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-pencil"></i>
            </div>
            <input class="form-control" id="robo-advisor-slug-input" type="text" name="slug" value="{{ old('slug') ?? $roboAdvisor->slug ??  ''}}">
        </div>

        @if ($errors->has('slug'))
            <span class="help-block">{{ $errors->first('slug') }}</span>
        @endif
    </div>
@endif
{{-- Robo Advisor verify property --}}
<div class="form-group">
    <div class="checkbox icheck">
        <label for="robo-advisor-is-verify-input">
            <input class="js-icheck" id="robo-advisor-is-verify-input" name="is_verify" type="checkbox" {{ (old('is_verify') || (isset($roboAdvisor) && $roboAdvisor->is_verify)) ? 'checked' : '' }} >
            Verify
        </label>
    </div>
</div>

{{-- Robo Advisor logo --}}
<div class="form-row row">
    <div class="form-group col-sm-6 {{ $errors->has('logo') ? ' has-error' : '' }}">
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
    @if (isset($roboAdvisor) && $roboAdvisor->logo)
        <div class="form-group col-sm-6">
            <img class="img-thumbnail" src="{{ asset('storage/' . $roboAdvisor->logo) }}" width="100">
        </div>
    @endif
</div>

{{-- Robo Advisor title --}}
<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="robo-advisor-title-input">Title</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="robo-advisor-title-input" type="text" name="title" value="{{ old('title') ?? $roboAdvisor->title ?? ''}}">
    </div>

    @if ($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div>

{{-- Robo Advisor short description --}}
<div class="form-group {{ $errors->has('short_description') ? ' has-error' : '' }}">
    <label for="robo-advisor-short-description-input">Short description</label>
    <textarea class="form-control js-editor" id="robo-advisor-short-description-input" name="short_description">{{ old('short_description') ?? $roboAdvisor->short_description ?? ''}}</textarea>

    @if ($errors->has('short_description'))
        <span class="help-block">{{ $errors->first('short_description') }}</span>
    @endif
</div>

{{-- Robo Advisor description --}}
<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="robo-advisor-description-input">Description</label>
    <textarea class="form-control js-editor" id="robo-advisor-description-input" name="description">{{ old('description') ?? $roboAdvisor->description ?? ''}}</textarea>

    @if ($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>

{{-- Account types --}}
<div class="form-group">
    <label for="robo-advisor-account-types-input">Accounts Available</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-money"></i>
        </div>
        <select class="form-control js-select2" id="robo-advisor-account-types-input" name="account_types[]" multiple style="width: 100%;">
            @foreach($accountTypes as $accountType)
                <option value="{{ $accountType->id }}" {{ in_array($accountType->id, (old('account_types') ?? $accountTypesID ?? [])) ? 'selected' : '' }}>{{ $accountType->name }}</option>
            @endforeach
        </select>
    </div>
</div>

{{-- Robo Advisor finra crd --}}
<div class="form-group {{ $errors->has('finra_crd') ? ' has-error' : '' }}">
    <label for="robo-advisor-finra-crd-input">FINRA CRD</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="robo-advisor-finra-crd-input" type="text" name="finra_crd" value="{{ old('finra_crd') ?? $roboAdvisor->finra_crd ?? ''}}">
    </div>

    @if ($errors->has('finra_crd'))
        <span class="help-block">{{ $errors->first('finra_crd') }}</span>
    @endif
</div>

{{-- Robo Advisor sec id --}}
<div class="form-group {{ $errors->has('sec_id') ? ' has-error' : '' }}">
    <label for="robo-advisor-sec-id-input">SEC ID</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="robo-advisor-sec-id-input" type="text" name="sec_id" value="{{ old('sec_id') ?? $roboAdvisor->sec_id ?? ''}}">
    </div>

    @if ($errors->has('sec_id'))
        <span class="help-block">{{ $errors->first('sec_id') }}</span>
    @endif
</div>

{{-- Robo Advisor referral link --}}
<div class="form-group {{ $errors->has('referral_link') ? ' has-error' : '' }}">
    <label for="robo-advisor-referral-link-input">Referral link</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-link"></i>
        </div>
        <input class="form-control" id="robo-advisor-referral-link-input" type="text" name="referral_link" value="{{ old('referral_link') ?? $roboAdvisor->referral_link ?? ''}}">
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
        <input class="form-control" id="robo-advisor-video-link-input" type="text" name="video_link" value="{{ old('video_link') ?? $roboAdvisor->video_link ?? ''}}">
    </div>

    @if ($errors->has('video_link'))
        <span class="help-block">{{ $errors->first('video_link') }}</span>
    @endif
</div>

{{-- Robo Advisor short description --}}
<div class="form-group {{ $errors->has('video_information') ? ' has-error' : '' }}">
    <label for="robo-advisor-video-information-input">Video information</label>
    <textarea class="form-control js-editor" id="robo-advisor-video-information-input" name="video_information">{{ old('video_information') ?? $roboAdvisor->video_information ?? ''}}</textarea>

    @if ($errors->has('video_information'))
        <span class="help-block">{{ $errors->first('video_information') }}</span>
    @endif
</div>
{{-------------- GENERAL CHARACTERISTICS ---------}}
<div>
    <div class="box-header with-border"><h3>General characteristics</h3></div>
    <br>
    <br>
    {{-- Robo Advisor minimum account --}}
    <div class="form-group {{ $errors->has('minimum_account') ? ' has-error' : '' }}">
        <label for="robo-advisor-minimum-account-input">Minimum account</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-pencil"></i>
            </div>
            <input class="form-control" id="robo-advisor-minimum-account-input" type="text" name="minimum_account" value="{{ old('minimum_account') ?? $roboAdvisor->minimum_account ?? ''}}">
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
            <input class="form-control" id="robo-advisor-management-fee-input" type="text" name="management_fee" value="{{ old('management_fee') ?? $roboAdvisor->management_fee ?? ''}}">
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
            <input class="form-control" id="robo-advisor-fee-details-input" type="text" name="fee_details" value="{{ old('fee_details') ?? $roboAdvisor->fee_details ?? ''}}">
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
            <input class="form-control" id="robo-advisor-aum-input" type="text" name="aum" value="{{ old('aum') ?? $roboAdvisor->aum ?? ''}}">
        </div>

        @if ($errors->has('aum'))
            <span class="help-block">{{ $errors->first('aum') }}</span>
        @endif
    </div>

    {{-- Robo Advisor number accounts --}}
    <div class="form-group {{ $errors->has('number_accounts') ? ' has-error' : '' }}">
        <label for="robo-advisor-number-accounts-input">Number of Accounts</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-pencil"></i>
            </div>
            <input class="form-control" id="robo-advisor-number-accounts-input" type="text" name="number_accounts" value="{{ old('number_accounts') ?? $roboAdvisor->number_accounts ?? ''}}">
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
            <input class="form-control" id="robo-advisor-average-account-size-input" type="text" name="average_account_size" value="{{ old('average_account_size') ?? $roboAdvisor->average_account_size ?? ''}}">
        </div>

        @if ($errors->has('average_account_size'))
            <span class="help-block">{{ $errors->first('average_account_size') }}</span>
        @endif
    </div>

    {{-- Robo Advisor promotions --}}
    <div class="form-group {{ $errors->has('promotions') ? ' has-error' : '' }}">
        <label for="robo-advisor-promotions-input">Promotions</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-pencil"></i>
            </div>
            <input class="form-control" id="robo-advisor-promotions-input" type="text" name="promotions" value="{{ old('promotions') ?? $roboAdvisor->promotions ?? ''}}">
        </div>

        @if ($errors->has('promotions'))
            <span class="help-block">{{ $errors->first('promotions') }}</span>
        @endif
    </div>
</div>
{{-------------- END GENERAL CHARACTERISTICS ---------}}
{{-------------- SERVICES ---------}}
<div>
    <div class="box-header with-border"><h3>Services</h3></div>
    <br>
    <br>
    {{-- Robo Advisor human advisors --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-human-advisors-input">
                <input class="js-icheck" id="robo-advisor-human-advisors-input" name="human_advisors" type="checkbox" {{ (old('human_advisors') || (isset($roboAdvisor) && $roboAdvisor->human_advisors)) ? 'checked' : '' }} >
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
            <input class="form-control" id="robo-advisor-human-advisors-details-input" type="text" name="human_advisors_details" value="{{ old('human_advisors_details') ?? $roboAdvisor->human_advisors_details ?? ''}}">
        </div>

        @if ($errors->has('human_advisors_details'))
            <span class="help-block">{{ $errors->first('human_advisors_details') }}</span>
        @endif
    </div>

    {{-- Robo Advisor portfolio rebalancing --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-portfolio-rebalancing-input">
                <input class="js-icheck" id="robo-advisor-portfolio-rebalancing-input" name="portfolio_rebalancing" type="checkbox" {{ (old('portfolio_rebalancing') || (isset($roboAdvisor) && $roboAdvisor->portfolio_rebalancing)) ? 'checked' : '' }} >
                Portfolio Rebalancing
            </label>
        </div>
    </div>

    {{-- Robo Advisor automatic deposits --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-automatic-deposits-input">
                <input class="js-icheck" id="robo-advisor-automatic-deposits-input" name="automatic_deposits" type="checkbox" {{ (old('automatic_deposits') || (isset($roboAdvisor) && $roboAdvisor->automatic_deposits)) ? 'checked' : '' }} >
                Automatic Deposits
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
            <input class="form-control" id="robo-advisor-access-platforms-input" type="text" name="access_platforms" value="{{ old('access_platforms') ?? $roboAdvisor->access_platforms ?? ''}}">
        </div>

        @if ($errors->has('access_platforms'))
            <span class="help-block">{{ $errors->first('access_platforms') }}</span>
        @endif
    </div>

    {{-- Robo Advisor two factor auth --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-two-factor-auth-input">
                <input class="js-icheck" id="robo-advisor-two-factor-auth-input" name="two_factor_auth" type="checkbox" {{ (old('two_factor_auth') || (isset($roboAdvisor) && $roboAdvisor->two_factor_auth)) ? 'checked' : '' }} >
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
            <input class="form-control" id="robo-advisor-customer-service-input" type="text" name="customer_service" value="{{ old('customer_service') ?? $roboAdvisor->customer_service ?? ''}}">
        </div>

        @if ($errors->has('customer_service'))
            <span class="help-block">{{ $errors->first('customer_service') }}</span>
        @endif
    </div>

    {{-- Robo Advisor clearing agency --}}
    <div class="form-group {{ $errors->has('clearing_agency') ? ' has-error' : '' }}">
        <label for="robo-advisor-clearing-agency-input">Clearing Agency</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-pencil"></i>
            </div>
            <input class="form-control" id="robo-advisor-clearing-agency-input" type="text" name="clearing_agency" value="{{ old('clearing_agency') ?? $roboAdvisor->clearing_agency ?? ''}}">
        </div>

        @if ($errors->has('clearing_agency'))
            <span class="help-block">{{ $errors->first('clearing_agency') }}</span>
        @endif
    </div>
</div>
{{-------------- END SERVICES ---------}}
{{-------------- Features ---------}}
<div>
    <div class="box-header with-border"><h3>Features</h3></div>
    <br>
    <br>
    {{-- Robo Advisor fractional shares --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-fractional-shares-input">
                <input class="js-icheck" id="robo-advisor-fractional-shares-input" name="fractional_shares" type="checkbox" {{ (old('fractional_shares') || (isset($roboAdvisor) && $roboAdvisor->fractional_shares)) ? 'checked' : '' }} >
                Fractional Shares
            </label>
        </div>
    </div>

    {{-- Robo Advisor assistance 401k --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-assistance-401k-input">
                <input class="js-icheck" id="robo-advisor-assistance-401k-input" name="assistance_401k" type="checkbox" {{ (old('assistance_401k') || (isset($roboAdvisor) && $roboAdvisor->assistance_401k)) ? 'checked' : '' }} >
                401k Assistance
            </label>
        </div>
    </div>

    {{-- Robo Advisor tax loss --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-tax-loss-input">
                <input class="js-icheck" id="robo-advisor-tax-loss-input" name="tax_loss" type="checkbox" {{ (old('tax_loss') || (isset($roboAdvisor) && $roboAdvisor->tax_loss)) ? 'checked' : '' }} >
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
            <input class="form-control" id="robo-advisor-tax-loss-details-input" type="text" name="tax_loss_details" value="{{ old('tax_loss_details') ?? $roboAdvisor->tax_loss_details ?? ''}}">
        </div>

        @if ($errors->has('tax_loss_details'))
            <span class="help-block">{{ $errors->first('tax_loss_details') }}</span>
        @endif
    </div>

    {{-- Robo Advisor retirement planning --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-retirement-planning-input">
                <input class="js-icheck" id="robo-advisor-retirement-planning-input" name="retirement_planning" type="checkbox" {{ (old('retirement_planning') || (isset($roboAdvisor) && $roboAdvisor->retirement_planning)) ? 'checked' : '' }} >
                Retirement Planning Tools
            </label>
        </div>
    </div>

    {{-- Robo Advisor self clearing --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-self-clearing-input">
                <input class="js-icheck" id="robo-advisor-self-clearing-input" name="self_clearing" type="checkbox" {{ (old('self_clearing') || (isset($roboAdvisor) && $roboAdvisor->self_clearing)) ? 'checked' : '' }} >
                Self Clearing
            </label>
        </div>
    </div>

    {{-- Robo Advisor smart beta --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-smart-beta-input">
                <input class="js-icheck" id="robo-advisor-smart-beta-input" name="smart_beta" type="checkbox" {{ (old('smart_beta') || (isset($roboAdvisor) && $roboAdvisor->smart_beta)) ? 'checked' : '' }} >
                Smart Beta
            </label>
        </div>
    </div>

    {{-- Robo Advisor responsible investing --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-responsible-investing-input">
                <input class="js-icheck" id="robo-advisor-responsible-investing-input" name="responsible_investing" type="checkbox" {{ (old('responsible_investing') || (isset($roboAdvisor) && $roboAdvisor->responsible_investing)) ? 'checked' : '' }} >
                Socially Responsible Investing
            </label>
        </div>
    </div>

    {{-- Robo Advisor invests commodities --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-invests-commodities-input">
                <input class="js-icheck" id="robo-advisor-invests-commodities-input" name="invests_commodities" type="checkbox" {{ (old('invests_commodities') || (isset($roboAdvisor) && $roboAdvisor->invests_commodities)) ? 'checked' : '' }} >
                Invests in Commodities
            </label>
        </div>
    </div>

    {{-- Robo Advisor real estate --}}
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-real-estate-input">
                <input class="js-icheck" id="robo-advisor-real-estate-input" name="real_estate" type="checkbox" {{ (old('real_estate') || (isset($roboAdvisor) && $roboAdvisor->real_estate)) ? 'checked' : '' }} >
                Invests in Real Estate
            </label>
        </div>
    </div>
</div>
{{-------------- END Features ---------}}

{{-------------- OTHER INFORMATION ---------}}
<div>
    <div class="box-header with-border"><h3>OTHER INFORMATION</h3></div>
    <br>
    <br>
    {{-- Robo Advisor additional information --}}
    <div class="form-group {{ $errors->has('additional_information') ? ' has-error' : '' }}">
        <label for="robo-advisor-additional-information-input">Additional information</label>
        <textarea class="form-control js-editor" id="robo-advisor-additional-information-input" name="additional_information">{{ old('additional_information') ?? $roboAdvisor->additional_information ?? ''}}</textarea>

        @if ($errors->has('additional_information'))
            <span class="help-block">{{ $errors->first('additional_information') }}</span>
        @endif
    </div>

    {{-- Robo Advisor summary --}}
    <div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
        <label for="robo-advisor-summary-input">Summary</label>
        <textarea class="form-control js-editor" id="robo-advisor-summary-input" name="summary">{{ old('summary') ?? $roboAdvisor->summary ?? ''}}</textarea>

        @if ($errors->has('summary'))
            <span class="help-block">{{ $errors->first('summary') }}</span>
        @endif
    </div>
</div>
{{-------------- END OTHER INFORMATION ---------}}
{{-------------- Blog ---------}}
<div>
    <div class="box-header with-border"><h3>Post</h3></div>
    <br>
    <br>
    <div class="form-group">
        <div class="checkbox icheck">
            <label for="robo-advisor-post-input">
                <input class="js-icheck" id="robo-advisor-post-input" name="robo_advisor_post" type="checkbox" {{ (old('robo_advisor_post') || (isset($roboAdvisor) && $roboAdvisor->post)) ? 'checked' : '' }} >
                Automatic post creation
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="category-input">Post Categories</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-money"></i>
            </div>
            <select class="form-control js-select2" id="category-input" name="categories[]" multiple style="width: 100%;">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ in_array($category->id, (old('categories') ?? $categoriesID ?? [])) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
{{-------------- Blog ---------}}
