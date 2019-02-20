@if(isset($breadcrumbs))
    <div class="breadcrumbs @if(isset($theme)){{$theme}}@endif">
        <div class="container">
            <ul class="breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList">
                @foreach($breadcrumbs as $breadcrumb)
                    <li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        @if ($loop->last)
                            <span class="breadcrumbs__current" itemprop="name">{{ $breadcrumb["name"] }}</span>
                        @else
                            <a class="breadcrumbs__link" href="{{ $breadcrumb["link"] }}" itemprop="item">
                                <span itemprop="name">{{ $breadcrumb["name"] }}</span>
                            </a>
                        @endif

                        <meta content="{{ $loop->iteration }}" itemprop="position">
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif