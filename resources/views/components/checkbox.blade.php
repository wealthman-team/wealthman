<div class="checkbox {{ isset($inline) ? 'checkbox_inline' : '' }}">
    <input id="{{ $id }}" name="{{ $name }}" type="checkbox" class="js-checkbox-input" {{ isset($isActive) && $isActive === true ? 'checked="checked"' : ''}}>
    <div class="checkbox__icon-container">
        @svg('check', 'checkbox__icon')
    </div>
</div>