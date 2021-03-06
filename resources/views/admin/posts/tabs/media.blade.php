
<div class="form-row row">
    <div class="form-group col-sm-6 {{ $errors->has('image') ? ' has-error' : '' }}">
        <label for="post-image">Post image</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-upload"></i>
            </div>
            <input id="post-image" class="form-control" name="image" type="file" accept="image/*">
        </div>

        @if ($errors->has('image'))
            <span class="help-block">{{ $errors->first('image') }}</span>
        @endif
    </div>
</div>
@if ((isset($postImages) && count($postImages) > 0) || (isset($postGallery) && count($postGallery) > 0))
    <div class="box-header with-border">
        <h3 class="box-title">Post Gallery</h3>
    </div>
    @foreach($postImages as $image)
        @include ('admin/posts/_card', ['image' => $image, 'active' => true])
    @endforeach
    @foreach($postGallery as $gallery)
        @include ('admin/posts/_card', ['image' => $gallery, 'active' => false])
    @endforeach
@endif