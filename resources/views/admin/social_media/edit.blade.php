@extends('admin.layout')
@section('title', 'Edit Sosial Media')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">Setting</li>
<li class="breadcrumb-item active">Social Media</li>
<li class="breadcrumb-menu d-md-down-none">
    <div class="btn-group" role="group" aria-label="Button group">
        <a class="btn" href="{{ route('admin.social_media.create') }}">
            <i class="icon-plus"></i>  Add Social Media</a>
    </div>
</li>
@stop

@section('content')
<!-- /.row-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i>Form Social Media</div>
            <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                @endif
                @if ($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
                @endif
                <form class="form-horizontal" action="{{ route('admin.social_media.update', $model->id) }}"
                    method="post">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-form-label" for="name">Name</label>
                        <div class="controls">
                            <input class="form-control" id="name" size="16" type="text" name="name"
                                placeholder="Title of the image" value="{{ $model->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="type">Type</label>
                        <div class="controls">
                            <select class="form-control" id="type" name="type" required>
                                <option value="null">Please select the type</option>
                                @foreach ($types as $type)
                                <option value="{{ $type }}" {{ ($type == $model->type) ? 'selected':'' }}>{{ $type }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="url">Url Social Media</label>
                        <div class="controls">
                            <input class="form-control" id="url" size="16" type="text" name="url"
                                placeholder="Url of the social media account" value="{{ $model->url }}">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <a href="{{ route('admin.social_media.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row-->
@stop
