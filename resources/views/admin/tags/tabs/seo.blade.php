<div class="form-group {{ $errors->has('seo_title') ? ' has-error' : '' }}">
    <label for="seo_title">Title</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="seo_title" type="text" name="seo_title" value="{{ old('seo_title') ?? $tag->seo_title ?? ''}}">
    </div>

    @if ($errors->has('seo_title'))
        <span class="help-block">{{ $errors->first('seo_title') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('seo_description') ? ' has-error' : '' }}">
    <label for="seo_description">Description</label>
    <textarea class="form-control" id="seo_description" name="seo_description">{{ old('seo_description') ?? $tag->seo_description ?? '' }}</textarea>

    @if ($errors->has('seo_description'))
        <span class="help-block">{{ $errors->first('seo_description') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
    <label for="seo_keywords">Keywords</label>
    <textarea class="form-control" id="seo_keywords" name="seo_keywords">{{ old('seo_keywords') ?? $tag->seo_keywords ?? '' }}</textarea>

    @if ($errors->has('seo_keywords'))
        <span class="help-block">{{ $errors->first('seo_keywords') }}</span>
    @endif
</div>