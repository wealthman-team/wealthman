<div class="img-card {{$active ? 'active' : ''}}">
    <img src="{{ $image->getUrl('thumb') }}" alt="{{ $image->name }}" class="margin" width="150" href="100">
    <div class="img-card__body">
        <div class="float-left">
            <a href="#" @if(!$active)onclick="event.preventDefault();document.getElementById('selectImageForm{{$image->id}}').submit();"@endif><i class="text-green fa fa-check"></i></a>
            <a href="#" onclick="event.preventDefault();document.getElementById('removeImageForm{{$image->id}}').submit();"><i class="text-red fa fa-minus-circle"></i></a>
        </div>
        <div class="float-right">
            <a href="{{$image->getUrl()}}" target="_blank"><i class="text-blue fa fa-eye"></i></a>
            <a href="#" onclick="event.preventDefault();document.getElementById('downloadImageForm{{$image->id}}').submit();"><i class="text-orange fa fa-cloud-download"></i></a>
        </div>
    </div>
</div>