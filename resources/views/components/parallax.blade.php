@php
    $hidden_stock = $hidden_stock ?? false;
@endphp
<div id="parallax" class="header-scene-wrapper">
    <div class="header-scene header-bg" data-modifier="10" data-scroll-to="400" style="background-image: url({{ $bg }})"></div>
    @if(!$hidden_stock)
        <div class="container">
            <div class="header-stack-wrapper">
                <img class="header-scene header-stack" data-modifier="10" data-scroll-to="200" src="/images/header-stack.png">
            </div>
        </div>
    @endif
</div>