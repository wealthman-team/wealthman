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
                        <h3 class="box-title">Show Account Type</h3>
                    </div>
                    <div class="box-body">
                        {{-- AccountType name --}}
                        <div class="form-group">
                            <label for="account-type-name-input">Name*</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <input class="form-control" id="account-type-name-input" type="text" name="name" value="{{ $accountType->name }}" readonly="readonly">
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <a class="btn btn-success" href="{{ route('admin.accountTypes.index') }}">
                            <i class="fa fa-save"></i>
                            <span>Back to list</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection