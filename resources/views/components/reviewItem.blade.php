<div class="review-item">
    <div class="review-item__user">
        <span class="user-icon">{{user_short_name($review->user->name)}}</span>
        <span class="review-item__user-name">{{$review->user->name}}</span>
    </div>
    <div class="review-item__header">
        <span class="review-item__type review-item__type-positive">
            @if($review->reviewType->code === 'positive')
                Would recommend
            @elseif($review->reviewType->code === 'negative')
                Not recommended
            @else
                Maybe recommend
            @endif
        </span>
        <span class="review-item__date">{{diffForHumans($review->created_at)}}</span>
    </div>
    <div class="review-item__content">
        <div class="review-item__comment">{{$review->comment}}</div>
        <div class="review-item__like">
            <div class="like">
                <span class="like-icon js-review-like">@svg('like')</span>
                <span class="like-count">{{$review->like > 0 ? $review->like : ''}}</span>
            </div>
            <div class="dislike">
                <span class="dislike-icon js-review-dislike">@svg('dislike')</span>
                <span class="dislike-count">{{$review->dislike > 0 ? $review->dislike : ''}}</span>
            </div>
        </div>
    </div>
</div>