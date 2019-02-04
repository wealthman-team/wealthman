@if(isset($reviews) && count($reviews) > 0)
@php
    $yes=0;
    $maybe=0;
    $no=0;
@endphp
@foreach ($reviews as $review)
    @php
        if ($review->reviewType->code === 'positive'){
            $yes++;
        } elseif ($review->reviewType->code === 'negative') {
            $no++;
        } else {
           $maybe++;
        }
        $text = recommended_text($yes,$maybe, $no);
    @endphp
@endforeach

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
        {{ $reviews->count() }} total votes
    </div>
</div>
@endif