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
                        <h3 class="box-title">Edit Account Type</h3>
                    </div>

                    <form action="{{ route('admin.accountTypes.update', $accountType) }}" method="post" role="form" autocomplete="off">
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

                            {{-- AccountType name --}}
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="account-type-name-input">Name*</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                    <input class="form-control" id="account-type-name-input" type="text" name="name" value="{{ old('name') ?? $accountType->name }}">
                                </div>

                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            {{-- AccountType activity property --}}
                            {{--<div class="form-group">
                                <div class="checkbox icheck">
                                    <label for="account-type-is-active-input">
                                        <input class="js-icheck" id="account-type-is-active-input" name="is_active" type="checkbox" {{ (old('is_active') || $accountType->is_active) ? 'checked' : '' }} >
                                        Is active
                                    </label>
                                </div>
                            </div>--}}

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