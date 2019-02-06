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
                        <h3 class="box-title">Edit Tag</h3>
                    </div>

                    <form action="{{ route('admin.tags.update', $tag) }}" method="post" role="form" autocomplete="off">
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

                            {{-- UsageType name --}}
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="tag-name-input">Name*</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                    <input class="form-control" id="tag-name-input" type="text" name="name" value="{{ old('name') ?? $tag->name }}">
                                </div>

                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
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