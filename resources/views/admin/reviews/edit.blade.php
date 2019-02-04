@extends('admin/layouts/admin')

@section('content')

    @if (session('status'))
        @include('components/noty', [
            'type' => 'error',
            'text' => session('status'),
        ])
    @endif

    <div class="content">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Review ID: {{$review->id}} User: {{$review->user->name}} Date: {{$review->created_at}}</h3>
                    </div>

                    <form action="{{ route('admin.reviews.update', $review) }}" method="post" role="form" autocomplete="off">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="box-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <div class="checkbox icheck">
                                    <label for="is-active-input">
                                        <input class="js-icheck" id="is-active-input" name="is_active" type="checkbox" {{ (old('is_active') || $review->is_active) ? 'checked' : '' }} >
                                        Published
                                    </label>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('comment') ? ' has-error' : '' }}">
                                <label for="comment-input">Comment</label>
                                <textarea class="form-control" id="comment-input" name="comment" style="height: 200px">{{ old('comment') ?? $review->comment }}</textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">{{ $errors->first('comment') }}</span>
                                @endif
                            </div>
                            <div class="box-header with-border"><h4>Review Type</h4></div>
                            <div class="row">
                                @if(old('review_type'))
                                    @php($review_type_id = old('review_type'))
                                @else
                                    @php($review_type_id = $review->reviewType->id)
                                @endif
                                @foreach($reviewTypes as $reviewType)
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                          <input type="radio" name="review_type" value="{{$reviewType->id}}" @if($review_type_id == $reviewType->id)checked="checked"@endif>
                                        </span>
                                            <input type="text" class="form-control" value="{{$reviewType->name}}" readonly>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i>
                                <span>Save</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection