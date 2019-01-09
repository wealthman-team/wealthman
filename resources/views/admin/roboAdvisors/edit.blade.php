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
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">Edit Robo Advisor</h3>
                    </div>

                    <form action="{{ route('admin.roboAdvisors.update', $roboAdvisor) }}" method="post" enctype="multipart/form-data" role="form" autocomplete="off">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="body">
                            
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
                                        <a href="#tab-robo-advisor-main-info" data-toggle="tab" aria-expanded="true">Main</a>
                                    </li>
                                    <li>
                                        <a href="#tab-robo-advisor-review" data-toggle="tab" aria-expanded="false">Review</a>
                                    </li>
                                    <li>
                                        <a href="#tab-robo-advisor-rating" data-toggle="tab" aria-expanded="false">Rating</a>
                                    </li>
                                    <li>
                                        <a href="#tab-robo-advisor-contacts" data-toggle="tab" aria-expanded="false">Contacts</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-robo-advisor-main-info">
                                        @include('admin.roboAdvisors.tabs.main')
                                    </div>

                                    <div class="tab-pane" id="tab-robo-advisor-review">
                                        @include('admin.roboAdvisors.tabs.review')
                                    </div>

                                    <div class="tab-pane" id="tab-robo-advisor-rating">
                                        @include('admin.roboAdvisors.tabs.rating')
                                    </div>

                                    <div class="tab-pane" id="tab-robo-advisor-contacts">
                                        @include('admin.roboAdvisors.tabs.contacts')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="footer">
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