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