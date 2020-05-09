@extends('admin.layout')
@section('title', 'Edit Image')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Gallery</a></li>
<li class="breadcrumb-item active">Edit</li>
@stop

@section('content')
<!-- /.row-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i>Form Gallery Image</div>
            <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                @endif
                @if ($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
                @endif
                <form class="form-horizontal" action="{{ route('admin.gallery.update', $model->id) }}" method="post"
                    enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-form-label" for="title">Title</label>
                        <div class="controls">
                            <input class="form-control" id="title" size="16" type="text" name="title"
                                placeholder="Title of the image" value="{{ $model->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="category">Category</label>
                        <div class="controls">
                            <select class="form-control" id="category" name="category_gallery_id" required>
                                <option value="null">Please select the category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ ($category->id == $model->category_gallery_id) ? 'selected':'' }}>
                                    {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="desc">Description</label>
                        <div class="controls">
                            <textarea class="form-control" id="desc" name="description" cols="30" rows="10"
                                placeholder="Description of the image">{{ $model->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="img-container">Image</label>
                        <div class="controls">
                            <img class="img-fluid" id="img-container" alt="Image Gallery" width="100" height="100"
                                src="{{ asset($model->showImage()) }}" />
                            <input type="file"
                                onchange="document.getElementById('img-container').src = window.URL.createObjectURL(this.files[0])"
                                name="image">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row-->
@stop

