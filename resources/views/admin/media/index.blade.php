@extends('admin/layouts/admin')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Media Library ({{ trans_choice(':count file|:count files', $media->count()) }})</h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('admin.media.create') }}">
                                <i class="fa fa-plus"></i>
                                <span>Add Image</span>
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
                                <th>Image</th>
                                <th>URL</th>
                                <th>Created at</th>
                                <th style="width: 150px;">Actions</th>
                            </tr>
                            @if(count($media) > 0)
                                @foreach($media as $medium)
                                    <tr>
                                        <td>{{ $medium->id }}</td>
                                        <td>
                                            <a href="{{ $medium->getUrl() }}" target="_blank">
                                                <img src="{{ $medium->getUrl('thumb') }}" alt="{{ $medium->name }}" width="100">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input class="form-control" id="medium-{{$medium->id}}" type="text" value="{{ url($medium->getUrl()) }}" readonly>
                                                <div class="input-group-addon btn" data-clipboard-target="#medium-{{ $medium->id }}">
                                                    <i class="fa fa-clipboard"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ humanize_date($medium->created_at, 'd/m/Y H:i:s') }}</td>
                                        <td>
                                            <a href="{{ $medium->getUrl() }}" title="Show" class="btn btn-primary btn-sm" target="_blank">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>

                                            <a href="{{ route('admin.media.show', $medium) }}" title="Download" class="btn btn-primary btn-sm">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                               href="#modal-danger"
                                               title="Delete"
                                               data-toggle="modal"
                                               data-action="{{ route('admin.media.destroy', $medium) }}"
                                            >
                                                <i class="icon fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" align="center">Media files are not in the database</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                            {{ $media->links() }}
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
            Delete file
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

