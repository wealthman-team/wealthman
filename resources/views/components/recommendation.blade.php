<div class="recommendation">
    <div class="recommendation__text">{{ $text }}</div>
    <div class="recommendation__graf">
        @if ($yes > 0)
            <div class="recommendation__yes" style="flex: {{ $yes }};">{{ $yes }}</div>
        @endif

        @if ($maybe > 0)
            <div class="recommendation__maybe" style="flex: {{ $maybe }};">{{ $maybe }}</div>
        @endif

        @if ($no > 0)
            <div class="recommendation__no" style="flex: {{ $no }};">{{ $no }}</div>
        @endif
    </div>
    <div class="recommendation__total">
        {{ $total }} total votes
    </div>
</div> 