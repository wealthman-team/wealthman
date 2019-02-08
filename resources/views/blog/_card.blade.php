<div class="post {{$card_class}}">
    <div class="post__container">
        <div class="post__image-box">
            <a href="{{route('blog.show', $post->slug)}}">
                @if ($post->getFirstMedia('images'))
                    <img class="post__image" src="{{ $post->getFirstMedia('images')->getUrl() }}" alt="{{ $post->getFirstMedia('images')->name }}">
                @endif
            </a>
        </div>
        <div class="post__item">
            <div class="post__item-text">
                <div class="post__category">
                    <a href="#">ROBO-ADVISORS REVIEW</a>
                </div>
                <div class="post__title">
                    <a href="{{route('blog.show', $post->slug)}}">{{$post->title}}</a>
                </div>
                <div class="post__content">
                    <a href="{{route('blog.show', $post->slug)}}">{{$post->content}}</a>
                </div>
            </div>
            <div class="post__footer">
                <div class="post__author">
                    <span class="user-icon user-icon__small">ok</span>
                    <span class="post__author-name">Anton Okrema</span>
                </div>
                <div class="post__date">{{humanize_date($post->published_at, 'd.m.Y')}}</div>
            </div>
        </div>
    </div>
</div>