<div class="post-row">
@foreach($popularPosts as $popularPost)
    @include ('blog/_card', ['post' => $popularPost, 'card_class' => 'post__small'])
@endforeach
</div>