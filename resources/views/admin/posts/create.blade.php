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
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab-post-main-info" data-toggle="tab" aria-expanded="true">Main</a>
                                    </li>
                                    <li>
                                        <a href="#tab-post-seo" data-toggle="tab" aria-expanded="false">SEO</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-post-main-info">
                                        @include('admin.posts.tabs.main')
                                    </div>

                                    <div class="tab-pane" id="tab-post-seo">
                                        @include('admin.posts.tabs.seo')
                                    </div>
                                </div>
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