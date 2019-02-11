{{-- Robo Advisor service region --}}
<div class="form-group {{ $errors->has('service_region') ? ' has-error' : '' }}">
    <label for="robo-advisor-service-region-input">Service region</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="robo-advisor-service-region-input" type="text" name="service_region" value="{{ old('service_region') ?? $roboAdvisor->service_region ?? ''}}">
    </div>

    @if ($errors->has('service_region'))
        <span class="help-block">{{ $errors->first('service_region') }}</span>
    @endif
</div>

{{-- Robo Advisor headquarters --}}
<div class="form-group {{ $errors->has('headquarters') ? ' has-error' : '' }}">
    <label for="robo-advisor-headquarters-input">Headquarters</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="robo-advisor-headquarters-input" type="text" name="headquarters" value="{{ old('headquarters') ?? $roboAdvisor->headquarters ?? ''}}">
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
        <input class="form-control" id="robo-advisor-founded-input" type="text" name="founded" value="{{ old('founded') ?? $roboAdvisor->founded ?? ''}}">
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
        <input class="form-control" id="robo-advisor-site-url-input" type="text" name="site_url" value="{{ old('site_url') ?? $roboAdvisor->site_url ?? ''}}">
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
        <input class="form-control" id="robo-advisor-phone-input" type="text" name="phone" value="{{ old('phone') ?? $roboAdvisor->phone ?? ''}}">
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
        <input class="form-control" id="robo-advisor-ceo-input" type="text" name="ceo" value="{{ old('ceo') ?? $roboAdvisor->ceo ?? ''}}">
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
        <input class="form-control" id="robo-advisor-contact-details-input" type="text" name="contact_details" value="{{ old('contact_details') ?? $roboAdvisor->contact_details ?? ''}}">
    </div>

    @if ($errors->has('contact_details'))
        <span class="help-block">{{ $errors->first('contact_details') }}</span>
    @endif
</div>