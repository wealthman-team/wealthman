{{-- Suitable for --}}
<div class="form-group">
    <label for="robo-advisor-usage-type-input">Suitable for</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-money"></i>
        </div>
        <select class="form-control js-select2" id="robo-advisor-usage-type-input" name="usage_types[]" multiple style="width: 100%;">
            @foreach($usageTypes as $usageType)
                <option value="{{ $usageType->id }}" {{ in_array($usageType->id, (old('usage_types') ?? $usageTypesID)) ? 'selected' : '' }}>{{ $usageType->name }}</option>
            @endforeach
        </select>
    </div>
</div>
{{-- About company --}}
<div class="form-group {{ $errors->has('about_company') ? ' has-error' : '' }}">
    <label for="robo-advisor-about-company-input">About company</label>
    <textarea class="form-control js-editor" id="robo-advisor-about-company-input" name="about_company">{{ old('about_company') ?? $roboAdvisor->about_company }}</textarea>

    @if ($errors->has('about_company'))
        <span class="help-block">{{ $errors->first('about_company') }}</span>
    @endif
</div>
