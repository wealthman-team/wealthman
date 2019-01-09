{{-- Robo Advisor Commissions & Fees --}}
<div class="form-group">
    <label for="robo-advisor-commissions-input">Commissions & Fees</label>
    <div class="no-ui-slider js-no-ui-slider"
         data-input-id="robo-advisor-commissions-input"
         data-value-id="robo-advisor-commissions-value"
         data-min="0"
         data-max="10"
    ></div>
    <div class="no-ui-slider-value" id="robo-advisor-commissions-value">{{ old('commissions') ?? $roboAdvisor->ratings->commissions }}</div>
    <input class="form-control" id="robo-advisor-commissions-input" type="hidden" name="commissions" value="{{ old('commissions') ?? $roboAdvisor->ratings->commissions }}">
</div>

{{-- Robo Advisor Customer Service --}}
<div class="form-group">
    <label for="robo-advisor-service-input">Customer Service</label>
    <div class="no-ui-slider js-no-ui-slider"
         data-input-id="robo-advisor-service-input"
         data-value-id="robo-advisor-service-value"
         data-min="0"
         data-max="10"
    ></div>
    <div class="no-ui-slider-value" id="robo-advisor-service-value">{{ old('service') ?? $roboAdvisor->ratings->service }}</div>
    <input class="form-control" id="robo-advisor-service-input" type="hidden" name="service" value="{{ old('service') ?? $roboAdvisor->ratings->service }}">
</div>

{{-- Robo Advisor Ease of Use --}}
<div class="form-group">
    <label for="robo-advisor-comfortable-input">Ease of Use</label>
    <div class="no-ui-slider js-no-ui-slider"
         data-input-id="robo-advisor-comfortable-input"
         data-value-id="robo-advisor-comfortable-value"
         data-min="0"
         data-max="10"
    ></div>
    <div class="no-ui-slider-value" id="robo-advisor-comfortable-value">{{ old('comfortable') ?? $roboAdvisor->ratings->comfortable }}</div>
    <input class="form-control" id="robo-advisor-comfortable-input" type="hidden" name="comfortable" value="{{ old('comfortable') ?? $roboAdvisor->ratings->comfortable }}">
</div>

{{-- Robo Advisor Tools & Resources --}}
<div class="form-group">
    <label for="robo-advisor-tools-input">Tools & Resources</label>
    <div class="no-ui-slider js-no-ui-slider"
         data-input-id="robo-advisor-tools-input"
         data-value-id="robo-advisor-tools-value"
         data-min="0"
         data-max="10"
    ></div>
    <div class="no-ui-slider-value" id="robo-advisor-tools-value">{{ old('tools') ?? $roboAdvisor->ratings->tools }}</div>
    <input class="form-control" id="robo-advisor-tools-input" type="hidden" name="tools" value="{{ old('tools') ?? $roboAdvisor->ratings->tools }}">
</div>

{{-- Robo Advisor Investment Options --}}
<div class="form-group">
    <label for="robo-advisor-investment-options-input">Investment Options</label>
    <div class="no-ui-slider js-no-ui-slider"
         data-input-id="robo-advisor-investment-options-input"
         data-value-id="robo-advisor-investment-options-value"
         data-min="0"
         data-max="10"
    ></div>
    <div class="no-ui-slider-value" id="robo-advisor-investment-options-value">{{ old('investment_options') ?? $roboAdvisor->ratings->investment_options }}</div>
    <input class="form-control" id="robo-advisor-investment-options-input" type="hidden" name="investment_options" value="{{ old('investment_options') ?? $roboAdvisor->ratings->investment_options }}">
</div>

{{-- Robo Advisor Asset Allocation --}}
<div class="form-group">
    <label for="robo-advisor-asset-allocation-input">Asset Allocation</label>
    <div class="no-ui-slider js-no-ui-slider"
         data-input-id="robo-advisor-asset-allocation-input"
         data-value-id="robo-advisor-asset-allocation-value"
         data-min="0"
         data-max="10"
    ></div>
    <div class="no-ui-slider-value" id="robo-advisor-asset-allocation-value">{{ old('asset_allocation') ?? $roboAdvisor->ratings->asset_allocation }}</div>
    <input class="form-control" id="robo-advisor-asset-allocation-input" type="hidden" name="asset_allocation" value="{{ old('asset_allocation') ?? $roboAdvisor->ratings->asset_allocation }}">
</div>