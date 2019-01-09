{{-- Suitable for --}}
<div class="form-group">
    <label for="robo-advisor-suitable-for-input">Suitable for</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-money"></i>
        </div>
        <select class="form-control js-select2" id="robo-advisor-suitable-for-input" name="account_types[]" multiple style="width: 100%;">
            @foreach($accountTypes as $accountType)
                <option value="{{ $accountType->id }}" {{ in_array($accountType->id, (old('account_types') ?? $accountTypesID)) ? 'selected' : '' }}>{{ $accountType->name }}</option>
            @endforeach
        </select>
    </div>
</div>