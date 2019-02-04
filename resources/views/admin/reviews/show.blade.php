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

                    <div class="box-body">
                        <div class="form-group">
                            <div class="checkbox icheck">
                                <label for="is-active-input">
                                    <input class="js-icheck" id="is-active-input" type="checkbox" disabled {{ $review->is_active ? 'checked' : '' }} >
                                    Published
                                </label>
                            </div>
                        </div>
                        {{-- Review Comment --}}
                        <div class="form-group">
                            <label for="review-comment-input">Comment</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <textarea class="form-control" id="review-comment-input" readonly="readonly">{{ $review->comment }}</textarea>
                            </div>
                        </div>
                        <div class="box-header with-border"><h4>Review Type</h4></div>
                        <div class="row">
                            @foreach($reviewTypes as $reviewType)
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                          <input type="radio" disabled @if($review->reviewType->id == $reviewType->id)checked="checked"@endif>
                                        </span>
                                        <input type="text" class="form-control" value="{{$reviewType->name}}" readonly>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="box-footer">
                        <a class="btn btn-success" href="{{ route('admin.reviews.index') }}">
                            <i class="fa fa-save"></i>
                            <span>Back to list</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection