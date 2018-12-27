<div class="simple-slider js-simple-slider">
    @foreach($images as $image)
        <div><img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}"></div>
    @endforeach
</div>