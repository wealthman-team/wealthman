<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="category-name-input">Name*</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="category-name-input" type="text" name="name" value="{{ old('name') ?? $category->name ?? '' }}">
    </div>

    @if ($errors->has('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description-input">Description</label>
    <textarea class="form-control js-editor" id="description-input" name="description">{{ old('description') ?? $category->description ?? ''  }}</textarea>

    @if ($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>
