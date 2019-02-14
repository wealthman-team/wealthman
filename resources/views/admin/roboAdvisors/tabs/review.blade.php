{{-- Suitable for --}}
<div class="form-group">
    <label for="robo-advisor-usage-type-input">Suitable for</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-money"></i>
        </div>
        <select class="form-control js-select2" id="robo-advisor-usage-type-input" name="usage_types[]" multiple style="width: 100%;">
            @foreach($usageTypes as $usageType)
                <option value="{{ $usageType->id }}" {{ in_array($usageType->id, (old('usage_types') ?? $usageTypesID ?? [])) ? 'selected' : '' }}>{{ $usageType->name }}</option>
            @endforeach
        </select>
    </div>
</div>
{{-- About company --}}
<div class="form-group {{ $errors->has('about_company') ? ' has-error' : '' }}">
    <label for="robo-advisor-about-company-input">About company</label>
    <textarea class="form-control js-editor" id="robo-advisor-about-company-input" name="about_company">{{ old('about_company') ?? $roboAdvisor->about_company ?? ''}}</textarea>

    @if ($errors->has('about_company'))
        <span class="help-block">{{ $errors->first('about_company') }}</span>
    @endif
</div>
{{-- Pros --}}
<div class="form-group {{ $errors->has('pros') ? ' has-error' : '' }}">
    <label for="robo-advisor-pros-input">Pros</label>
    <textarea class="form-control js-editor" id="robo-advisor-pros-input" name="pros">{{ old('pros') ?? $roboAdvisor->pros ?? ''}}</textarea>

    @if ($errors->has('pros'))
        <span class="help-block">{{ $errors->first('pros') }}</span>
    @endif
</div>
{{-- Cons --}}
<div class="form-group {{ $errors->has('cons') ? ' has-error' : '' }}">
    <label for="robo-advisor-cons-input">Cons</label>
    <textarea class="form-control js-editor" id="robo-advisor-cons-input" name="cons">{{ old('cons') ?? $roboAdvisor->cons ?? ''}}</textarea>

    @if ($errors->has('cons'))
        <span class="help-block">{{ $errors->first('cons') }}</span>
    @endif
</div>
{{-- How it works --}}
<div class="form-group {{ $errors->has('how_it_works') ? ' has-error' : '' }}">
    <label for="robo-advisor-how-it-works-input">How it works</label>
    <textarea class="form-control js-editor" id="robo-advisor-how-it-works-input" name="how_it_works">{{ old('how_it_works') ?? $roboAdvisor->how_it_works ?? ''}}</textarea>

    @if ($errors->has('how_it_works'))
        <span class="help-block">{{ $errors->first('how_it_works') }}</span>
    @endif
</div>
{{-- Portfolio --}}
<div class="form-group {{ $errors->has('portfolio') ? ' has-error' : '' }}">
    <label for="robo-advisor-portfolio-input">Portfolio</label>
    <textarea class="form-control js-editor" id="robo-advisor-portfolio-input" name="portfolio">{{ old('portfolio') ?? $roboAdvisor->portfolio ?? ''}}</textarea>

    @if ($errors->has('portfolio'))
        <span class="help-block">{{ $errors->first('portfolio') }}</span>
    @endif
</div>
{{-- Conclusion --}}
<div class="form-group {{ $errors->has('conclusion') ? ' has-error' : '' }}">
    <label for="robo-advisor-conclusion-input">Conclusion</label>
    <textarea class="form-control js-editor" id="robo-advisor-conclusion-input" name="conclusion">{{ old('conclusion') ?? $roboAdvisor->conclusion ?? ''}}</textarea>

    @if ($errors->has('conclusion'))
        <span class="help-block">{{ $errors->first('conclusion') }}</span>
    @endif
</div>