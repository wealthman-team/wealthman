@extends('admin/layouts/admin')

@section('content')

    @if (session('status'))
        @include('components/noty', [
            'type' => session('statusType'),
            'text' => session('status'),
        ])
    @endif

    <div class="content">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Post</h3>
                    </div>

                    <form action="{{ route('admin.posts.store') }}" method="post" role="form" autocomplete="off">
                        {{ csrf_field() }}
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
                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="post-title-input">Title*</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                    <input class="form-control" id="post-title-input" type="text" name="title" value="{{ old('title') }}">
                                </div>

                                @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i>
                                <span>Add</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection