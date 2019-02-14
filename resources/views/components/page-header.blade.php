<h1 class="page-header {{ $header_class ?? ''}}">
    {!! $header !!}
</h1>
<div class="page-sub-header {{ $sub_header_class ?? ''}}">
    @if(isset($sub_header))
        {!! $sub_header !!}
    @endif
</div>
