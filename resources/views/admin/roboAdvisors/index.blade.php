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
                        <h3 class="box-title">Robo advisers</h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('admin.roboAdvisors.create') }}">
                                <i class="fa fa-plus"></i>
                                <span>Add robo adviser</span>
                            </a>
                        </div>
                    </div>

                    <div class="box-body">

                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th style="width: 50px;">ID</th>
                                    <th>Name</th>
                                    <th style="width: 150px;">Actions</th>
                                </tr>

                                @foreach($roboAdvisors as $roboAdvisor)
                                    <tr>
                                        <td>{{ $roboAdvisor->id }}</td>
                                        <td>
                                            <div>{{ $roboAdvisor->name }}</div>
                                            @if ($roboAdvisor->is_verify)
                                                <small class="label bg-primary">verify</small>
                                            @endif
                                        </td>
                                        <td>
                                            {{--<form action="{{ route('admin.activitySwitch.roboAdvisor', $roboAdvisor) }}" method="post" role="form" style="display: inline-block;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="is_active" value="{{ !$roboAdvisor->is_active }}">
                                                <button class="btn btn-sm {{ $roboAdvisor->is_active ? 'btn-primary' : 'btn-gray' }}"
                                                        title="{{ $roboAdvisor->is_active ? 'Hide' : 'Show' }}"
                                                        type="submit"
                                                >
                                                    <i class="icon fa {{ $roboAdvisor->is_active ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                                </button>
                                            </form>--}}

                                            <a class="btn btn-success btn-sm" href="{{ route('admin.roboAdvisors.edit', $roboAdvisor) }}" title="Edit">
                                                <i class="icon fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                               href="#modal-danger"
                                               title="Delete"
                                               data-toggle="modal"
                                               data-action="{{ route('admin.roboAdvisors.destroy', $roboAdvisor) }}"
                                            >
                                                <i class="icon fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                            {{ $roboAdvisors->links() }}
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
            Delete robo advisor
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