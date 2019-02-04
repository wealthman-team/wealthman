@extends('admin/layouts/admin')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Users</h3>
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
                                <th>Email</th>
                                <th>Created</th>
                            </tr>
                            @if(count($users) > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Users are not in the database</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection