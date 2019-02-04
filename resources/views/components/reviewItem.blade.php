@php
    $like_count=0;
    $dislike_count=0;
@endphp

@foreach ($review->likes as $like)
    @php
        if ($like->like){
          $like_count++;
        } else {
          $dislike_count++;
        }
    @endphp
@endforeach

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
            <div class="js-like-container">
                <div class="like">
                    <a href="{{route('reviews.like')}}" class="like-icon{{auth()->user() ? ' js-review-like': ' js-modal-open'}}" {{auth()->user() ? '': 'data-modal=modal-auth'}} data-like="1" data-review="{{$review->id}}">@svg('like')</a>
                    <span class="like-count js-like-count">{{$like_count > 0 ? $like_count : ''}}</span>
                </div>
                <div class="dislike">
                    <a href="{{route('reviews.like')}}" class="dislike-icon{{auth()->user() ? ' js-review-like': ' js-modal-open'}}" {{auth()->user() ? '': 'data-modal=modal-auth'}} data-like="0" data-review="{{$review->id}}">@svg('dislike')</a>
                    <span class="dislike-count js-dislike-count">{{$dislike_count > 0 ? $dislike_count : ''}}</span>
                </div>
            </div>
        </div>
    </div>
</div>