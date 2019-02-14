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
                        <h3 class="box-title">Edit Post</h3>
                    </div>

                    <form action="{{ route('admin.posts.update', $post) }}" method="post" role="form" autocomplete="off" enctype="multipart/form-data">
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
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab-post-main-info" data-toggle="tab" aria-expanded="true">Main</a>
                                    </li>
                                    <li>
                                        <a href="#tab-post-media" data-toggle="tab" aria-expanded="true">Media</a>
                                    </li>
                                    <li>
                                        <a href="#tab-post-seo" data-toggle="tab" aria-expanded="false">SEO</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-post-main-info">
                                        @include('admin.posts.tabs.main')
                                    </div>

                                    <div class="tab-pane" id="tab-post-media">
                                        @include('admin.posts.tabs.media')
                                    </div>

                                    <div class="tab-pane" id="tab-post-seo">
                                        @include('admin.posts.tabs.seo')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i>
                                <span>Save</span>
                            </button>
                        </div>
                    </form>
                    @if ((isset($postImages) && count($postImages) > 0) || (isset($postGallery) && count($postGallery) > 0))
                        @foreach($postImages as $image)
                            <form id="removeImageForm{{$image->id}}" action="{{route('admin.post.image.remove')}}" method="post" style="display: none;">
                                @csrf
                                <input type="hidden" name="removed_image" value="{{$image->id}}">
                            </form>
                            <form id="downloadImageForm{{$image->id}}" action="{{route('admin.post.image.download')}}" method="post" style="display: none;">
                                @csrf
                                <input type="hidden" name="download_image" value="{{$image->id}}">
                            </form>
                        @endforeach
                        @foreach($postGallery as $gallery)
                                <form id="selectImageForm{{$gallery->id}}" action="{{route('admin.post.image.select')}}" method="post" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="selected_image" value="{{$gallery->id}}">
                                </form>
                                <form id="removeImageForm{{$gallery->id}}" action="{{route('admin.post.image.remove')}}" method="post" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="removed_image" value="{{$gallery->id}}">
                                </form>
                                <form id="downloadImageForm{{$gallery->id}}" action="{{route('admin.post.image.download')}}" method="post" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="download_image" value="{{$gallery->id}}">
                                </form>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection