@extends('admin/layouts/admin')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Categories</h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('admin.categories.create') }}">
                                <i class="fa fa-plus"></i>
                                <span>Add Category</span>
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
                                    <th>Name</th>
                                    <th style="width: 150px;">Actions</th>
                                </tr>
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="{{ route('admin.categories.edit', $category) }}" title="Edit">
                                                    <i class="icon fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm"
                                                   href="#modal-danger"
                                                   title="Delete"
                                                   data-toggle="modal"
                                                   data-action="{{ route('admin.categories.destroy', $category) }}"
                                                >
                                                    <i class="icon fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" align="center">Categories are not in the database</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                            {{ $categories->links() }}
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
            Delete category
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