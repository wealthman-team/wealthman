<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="post-title-input">Title*</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="post-title-input" type="text" name="title" value="{{ old('title') ?? $post->title ?? ''}}">
    </div>

    @if ($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
    <label for="content-input">Short Content</label>
    <textarea class="form-control" id="content-input" name="content">{{ old('content') ?? $post->content ?? '' }}</textarea>

    @if ($errors->has('content'))
        <span class="help-block">{{ $errors->first('content') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('content_html') ? ' has-error' : '' }}">
    <label for="content-html-input">Content</label>
    <textarea class="form-control js-editor" id="content-html-input" name="content_html">{{ old('content_html') ?? $post->content_html ?? ''  }}</textarea>

    @if ($errors->has('content_html'))
        <span class="help-block">{{ $errors->first('content_html') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="category-input">Categories</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-money"></i>
        </div>
        <select class="form-control js-select2" id="category-input" name="categories[]" multiple style="width: 100%;">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ in_array($category->id, (old('categories') ?? $categoriesID ?? [])) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="tag-input">Tags</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-tags"></i>
        </div>
        <select class="form-control js-select2" id="tag-input" name="tags[]" multiple style="width: 100%;">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ in_array($tag->id, (old('tags') ?? $tagsID ?? [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
</div>