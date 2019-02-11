<div class="post {{$card_class}}">
    <div class="post__container">
        <div class="post__image-box">
            <a href="{{route('blog.show', $post->slug)}}">
                <img class="post__image" src="{{ getPostImageUrl($card_class, $post) }}" alt="">
            </a>
        </div>
        <div class="post__item">
            <div class="post__item-text">
                @if($post->categories->count() > 0)
                <div class="post__category" title="{{$post->categories->count()}}">
                    @foreach($post->categories as $category)
                        <a class="post__category-link" href="{{route('blog.category', $category->slug)}}">{{$category->name}}</a>
                        @if(!$loop->last)
                            <span class="post__category-separator">|</span>
                        @endif
                    @endforeach
                </div>
                @endif
                <div class="post__title">
                    <a href="{{route('blog.show', $post->slug)}}">{{$post->title}}</a>
                </div>
                <div class="post__content">
                    <a href="{{route('blog.show', $post->slug)}}">{{$post->content}}</a>
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