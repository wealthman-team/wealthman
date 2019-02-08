<div class="img-card {{$active ? 'active' : ''}}">
    <img src="{{ $image->getUrl('thumb') }}" alt="{{ $image->name }}" class="margin" width="150" href="100">
    <div class="img-card__body">
        <div class="float-left">
            <a href="#" @if(!$active)onclick="event.preventDefault();document.getElementById('selectImageForm{{$image->id}}').submit();"@endif><i class="text-green fa fa-check"></i></a>
            @if(!$active)
            <form id="selectImageForm{{$image->id}}" action="{{route('admin.post.image.select')}}" method="post" style="display: none;">
                @csrf
                <input type="hidden" name="selected_image" value="{{$image->id}}">
            </form>
            @endif
            <a href="#" onclick="event.preventDefault();document.getElementById('removeImageForm{{$image->id}}').submit();"><i class="text-red fa fa-minus-circle"></i></a>
            <form id="removeImageForm{{$image->id}}" action="{{route('admin.post.image.remove')}}" method="post" style="display: none;">
                @csrf
                <input type="hidden" name="removed_image" value="{{$image->id}}">
            </form>
        </div>
        <div class="float-right">
            <a href="{{$image->getUrl()}}" target="_blank"><i class="text-blue fa fa-eye"></i></a>
            <a href="#" onclick="event.preventDefault();document.getElementById('downloadImageForm{{$image->id}}').submit();"><i class="text-orange fa fa-cloud-download"></i></a>
            <form id="downloadImageForm{{$image->id}}" action="{{route('admin.post.image.download')}}" method="post" style="display: none;">
                @csrf
                <input type="hidden" name="download_image" value="{{$image->id}}">
            </form>
        </div>
    </div>
</div>