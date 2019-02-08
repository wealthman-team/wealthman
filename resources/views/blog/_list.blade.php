@if(count($posts) > 0)
    @foreach($posts as $post)
        @if (($loop->index % 6) === 0 || ($loop->index % 6) === 1 || ($loop->index % 6) === 4)
            <div class="post-row">
        @endif
            @include ('blog/_card', ['post' => $post, 'card_class' => post_class($loop->index)])

        @if($loop->last || $loop->index % 6 === 0 || ($loop->index % 6) === 3 || ($loop->index % 6) === 5)
            </div>
        @endif
    @endforeach
@else
    <div class="post-wrapper">
        <div class="post post__large">
            <div class="post__container">
                <div class="post__empty">
                    <span>There is no post for the moment.</span>
                </div>
            </div>
        </div>
    </div>
@endif