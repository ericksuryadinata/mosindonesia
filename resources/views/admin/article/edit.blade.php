@extends('admin.layout')
@section('title', 'Edit Article')

@section('scripts')
<script>
    var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['image', 'clean']                                         // remove formatting button
        ];
        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Description of the Article',
            theme: 'snow'  // or 'bubble'
        });

        quill.root.innerHTML = '{!! $model->description !!}';

        var form = document.querySelector('form');
        form.onsubmit = function() {
            // Populate hidden form on submit
            var description = document.querySelector('input[name=description]');
            description.value = quill.root.innerHTML;
            return true;
        };
</script>
@stop

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.article.index') }}">Article</a></li>
<li class="breadcrumb-item active">Edit</li>
@stop

@section('content')
<!-- /.row-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i>Form Article</div>
            <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                @endif
                @if ($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
                @endif
                <form class="form-horizontal" action="{{ route('admin.article.update', $model->id) }}" method="post"
                    enctype="multipart/form-data">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-form-label" for="title">Title</label>
                        <div class="controls">
                            <input class="form-control" id="title" size="16" type="text" name="title"
                                placeholder="Title of the Article" value="{{ $model->title }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="category">Category</label>
                        <div class="controls">
                            <select class="form-control" id="category" name="category_article_id" required>
                                <option>Please select the category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ ($model->category_article_id == $category->id) ? 'selected':'' }}>
                                    {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="editor">Description</label>
                        <div class="controls">
                            <div id="editor"></div>
                            <input type="hidden" name="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="img-container">Image</label>
                        <div class="controls">
                            <img class="img-fluid" id="img-container" alt="Image Article" width="100" height="100"
                                src="{{ asset($model->showImage()) }}" />
                            <input type="file"
                                onchange="document.getElementById('img-container').src = window.URL.createObjectURL(this.files[0])"
                                name="image">
                        </div>
                        <span class="help-block">Maximum allowed size is 2MB</span>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <a href="{{ route('admin.article.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row-->
@stop
