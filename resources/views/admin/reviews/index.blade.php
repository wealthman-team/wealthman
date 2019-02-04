@extends('admin/layouts/admin')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Reviews</h3>
                    </div>

                    <div class="box-body">
                        @if (session('status'))
                            @include('components/noty', [
                                'type' => 'success',
                                'text' => session('status'),
                            ])
                        @endif

                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width: 50px;">ID</th>
                                <th>Type</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th style="width: 90px;">Actions</th>
                            </tr>
                            @if(count($reviews) > 0)
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>
                                            @if($review->reviewType->code === 'positive')
                                                <span class="text-green">Would recommend</span>
                                            @elseif($review->reviewType->code === 'negative')
                                                <span class="text-red">Not recommended</span>
                                            @else
                                                <span class="text-blue">Maybe recommend</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ str_limit($review->comment, 50, '...') }}
                                        </td>
                                        <td>
                                            @if($review->is_active)
                                                published
                                            @else
                                                <span class="review-unpublished">unpublished</span>
                                            @endif
                                        </td>
                                        <td>{{ $review->created_at }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="{{ route('admin.reviews.edit', $review) }}" title="Edit">
                                                <i class="icon fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                               href="#modal-danger"
                                               title="Delete"
                                               data-toggle="modal"
                                               data-action="{{ route('admin.reviews.destroy', $review) }}"
                                            >
                                                <i class="icon fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Reviews are not in the database</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                            {{ $reviews->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @component('components/modal', [
            'id' => 'modal-danger',
            'classes' => 'modal-danger js-model-delete-modal',
        ])
        @slot('title')
            Delete review
        @endslot

        @slot('body')
            A you sure?
        @endslot

        @slot('footer')
            <form class="js-model-delete-form" action="" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline">Delete</button>
            </form>
        @endslot
    @endcomponent
@endsection