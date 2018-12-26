<div class="recommendation {{ (isset($isOpen) && $isOpen) ? ' opened' : '' }}">
    <div class="recommendation__text">{{ $text }}</div>
    <div class="recommendation__graf">
        @if ($yes > 0)
            <div class="recommendation__yes" style="flex: {{ $yes }};"><span>{{ $yes }}</span></div>
        @endif

        @if ($maybe > 0)
            <div class="recommendation__maybe" style="flex: {{ $maybe }};"><span>{{ $maybe }}</span></div>
        @endif

        @if ($no > 0)
            <div class="recommendation__no" style="flex: {{ $no }};"><span>{{ $no }}</span></div>
        @endif
    </div>
    <div class="recommendation__total">
        {{ $total }} total votes
    </div>
</div> 