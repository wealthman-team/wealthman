@if(count($filtersOption) > 0)
    <ul class="filter-articles">
        @foreach($filtersOption as $option)
            <li class="filter-articles__item">
                <a href="{{ $option['url'] }}" class="filter-articles__link {{$option['active'] ? 'active': ''}}">
                    {{ $option['name'] }}
                    @if($option['count'] > 0 && $option['show_count'])
                        <span class="filter-articles__count">({{ $option['count'] }})</span>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
@else
    <ul class="filter-articles">
        <li class="filter-articles__item">
            <span class="filter-articles__link">Not found articles</span>
        </li>
    </ul>
@endif