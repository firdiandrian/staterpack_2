@extends('admin.layout')

@section('title')
    Edit Social Media |    
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Social Media</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{ route('admin.social.index') }}">Social Media</a>
            </div>
            <div class="breadcrumb-item">
                {{ $model->title }}
            </div>
            <div class="breadcrumb-item active">
                Edit
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (Session::has('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
            @endif
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
            @endif
            <form class="form-horizontal" action="{{ route('admin.social.update', $model->id) }}" method="post" enctype="multipart/form-data" id="form-posts" > {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-form-label" for="title">Title</label>
                    <div class="controls">
                        <input class="form-control" id="title" size="16" type="text" name="title" placeholder="Title of the Social Media" value="{{ $model->title }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="type">Type</label>
                    <div class="controls">
                        <select class="form-control" id="type" name="type" required>
                            <option value="facebook" {{ @$model->type == 'facebook' ? 'selected' : '' }}>Facebook</option>
                            <option value="twitter" {{ @$model->type == 'twitter' ? 'selected' : '' }}>Twitter</option>
                            <option value="instagram" {{ @$model->type == 'instagram' ? 'selected' : '' }}>Instagram</option>
                            <option value="linkedin" {{ @$model->type == 'linkedin' ? 'selected' : '' }}>Linkedin</option>
                            <option value="dribbble" {{ @$model->type == 'dribbble' ? 'selected' : '' }}>Dribbble</option>
                            <option value="youtube" {{ @$model->type == 'youtube' ? 'selected' : '' }}>Youtube</option>
                            <option value="tiktok" {{ @$model->type == 'tiktok' ? 'selected' : '' }}>Tiktok</option>
                            <option value="spotify" {{ @$model->type == 'spotify' ? 'selected' : '' }}>Spotify</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="title">Url Sosial Media</label>
                    <div class="controls">
                        <input class="form-control" id="url" size="16" type="text" name="url" value="{{ $model->url }}" required>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.social.index') }}" tabindex="-1" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <button class="btn btn-primary ml-2" type="submit">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop