@extends('admin/layouts/admin')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Posts</h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('admin.posts.create') }}">
                                <i class="fa fa-plus"></i>
                                <span>Add Post</span>
                            </a>
                        </div>
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
                                    <th style="width: 55px;">Image</th>
                                    <th style="width: 50%">Title</th>
                                    <th>Information</th>
                                    <th style="width: 150px;">Actions</th>
                                </tr>
                                @if(count($posts) > 0)
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>
                                                @if ($post->getFirstMedia('images'))
                                                    <img src="{{ $post->getFirstMedia('images')->getUrl('thumb') }}" alt="" width="50" href="50">
                                                @endif
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <ul class="post-info">
                                                    <li>author: <span class="">{{ $post->author->name }}</span></li>
                                                    @if($post->published)
                                                        <li>status: <span class="text-green">published</span></li>
                                                        @if($post->published_at)
                                                            <li>published at: <span class="">{{humanize_date($post->published_at, 'd/m/Y, H:i')}}</span></li>
                                                        @endif
                                                    @else
                                                        <li>status: <span class="text-red">unpublished</span></li>
                                                    @endif
                                                </ul>

                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="{{ route('admin.posts.edit', $post) }}" title="Edit">
                                                    <i class="icon fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm"
                                                   href="#modal-danger"
                                                   title="Delete"
                                                   data-toggle="modal"
                                                   data-action="{{ route('admin.posts.destroy', $post) }}"
                                                >
                                                    <i class="icon fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" align="center">Posts are not in the database</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                            {{ $posts->links() }}
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
            Delete post
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