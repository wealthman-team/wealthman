<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="post-title-input">Title*</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="post-title-input" type="text" name="title" value="{{ old('title') ?? $post->title ?? ''}}" {{isset($is_robo_advisor) && $is_robo_advisor ? 'readonly': ''}}>
    </div>

    @if ($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
    <label for="content-input">Short Content*</label>
    <textarea class="form-control" id="content-input" name="content" {{isset($is_robo_advisor) && $is_robo_advisor ? 'readonly': ''}}>{{ old('content') ?? $post->content ?? '' }}</textarea>

    @if ($errors->has('content'))
        <span class="help-block">{{ $errors->first('content') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('content_html') ? ' has-error' : '' }}">
    <label for="content-html-input">Content*</label>
    <textarea class="form-control {{isset($is_robo_advisor) && $is_robo_advisor ? '': 'js-editor'}}" id="content-html-input" name="content_html" {{isset($is_robo_advisor) && $is_robo_advisor ? 'readonly': ''}}>{{ old('content_html') ?? $post->content_html ?? ''  }}</textarea>

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
        @if(isset($is_robo_advisor) && $is_robo_advisor)
            <input type="hidden" name="disabled_categories" value="1">
        @endif
        <select class="form-control js-select2" id="category-input" name="categories[]" multiple style="width: 100%;" {{isset($is_robo_advisor) && $is_robo_advisor ? 'disabled': ''}}>
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

<div class="form-group {{ $errors->has('redirect_url') ? ' has-error' : '' }}">
    <label for="post-redirect-url-input">Redirect Url</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <input class="form-control" id="post-redirect-url-input" type="text" name="redirect_url" value="{{ old('redirect_url') ?? $post->redirect_url ?? ''}}" {{isset($is_robo_advisor) && $is_robo_advisor ? 'readonly': ''}}>
    </div>

    @if ($errors->has('redirect_url'))
        <span class="help-block">{{ $errors->first('redirect_url') }}</span>
    @endif
</div>

<div class="box-header with-border">
    <h3 class="box-title">Publish settings</h3>
</div>
<div class="form-group">
    <div class="checkbox icheck">
        <label for="published-input">
            <input class="js-icheck" id="published-input" name="published" type="checkbox" {{ (old('published') || (isset($post) && $post->published)) ? 'checked' : '' }} >
            Published
        </label>
    </div>
</div>
{{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
        {{--<label>Published At:</label>--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
        {{--<div class="form-group">--}}
            {{--<div class="input-group date">--}}
                {{--<div class="input-group-addon">--}}
                    {{--<i class="fa fa-calendar"></i>--}}
                {{--</div>--}}
                {{--<input type="text" class="form-control pull-right">--}}
            {{--</div>--}}
            {{--<!-- /.input group -->--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
        {{--<div class="input-group js-time-picker">--}}
            {{--<div class="input-group-addon">--}}
                {{--<i class="fa fa-clock-o"></i>--}}
            {{--</div>--}}
            {{--<input type="text" class="form-control">--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
