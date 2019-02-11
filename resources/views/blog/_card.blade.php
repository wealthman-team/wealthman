@php
    $post_url = !empty($post->redirect_url) ? $post->redirect_url : route('blog.show', $post->slug);
@endphp
<div class="post {{$card_class}}">
    <div class="post__container">
        <div class="post__image-box">
            <a href="{{$post_url}}">
                <img class="post__image" src="{{ getPostImageUrl($card_class, $post) }}" alt="">
            </a>
        </div>
        <div class="post__item">
            <div class="post__item-text">
                @if($post->categories->count() > 0)
                <div class="post__category">
                    @foreach($post->categories as $category)
                        <a class="post__category-link" href="{{route('blog.category', $category->slug)}}">{{$category->name}}</a>
                        @if(!$loop->last)
                            <span class="post__category-separator">|</span>
                        @endif
                    @endforeach
                </div>
                @endif
                <div class="post__title">
                    <a href="{{$post_url}}">{{$post->title}}</a>
                </div>
                <div class="post__content">
                    <a href="{{$post_url}}">{{$post->content}}</a>
                </div>
            </div>
            <div class="post__footer">
                <div class="post__author">
                    <span class="user-icon user-icon__small">{{user_short_name($post->author->name)}}</span>
                    <span class="post__author-name">{{$post->author->name}}</span>
                </div>
                <div class="post__date">{{humanize_date($post->published_at, 'd.m.Y')}}</div>
            </div>
        </div>
    </div>
</div>