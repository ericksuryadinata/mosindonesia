@extends('admin.layout')
@section('title', 'Edit Service')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Service</a></li>
<li class="breadcrumb-item active">Edit</li>
@stop

@section('content')
<!-- /.row-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i>Form Service</div>
            <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                @endif
                @if ($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
                @endif
                <form class="form-horizontal" action="{{ route('admin.service.update', $service->id) }}" method="post"
                    enctype="multipart/form-data">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-form-label" for="title">Title</label>
                        <div class="controls">
                            <input class="form-control" id="title" size="16" type="text" name="title"
                                placeholder="Title" value="{{ $service->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="desc">Description</label>
                        <div class="controls">
                            <textarea class="form-control" id="desc" name="description" cols="30" rows="10"
                                placeholder="Description">{{ $service->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label class="col-form-label" for="img-container">Icon</label>
                                <div class="controls">
                                    <input class="form-control icp icp-auto" type="text" name="icon" value="{{$service->icon}}"/>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12 lead">
                                <label class="col-form-label" for="img-container">Preview Icon</label>
                                <div class="controls">
                                    <i class="{{$service->icon}} fa-3x picker-target"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <a href="{{ route('admin.service.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row-->
@stop

@section('scripts')
<script src="{{url('mos-panel/vendors/icon-picker/js/fontawesome-iconpicker.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.icp-auto').iconpicker({
            placement:'top',
        });

        $('.icp').on('iconpickerSelected', function (e) {
            $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
                e.iconpickerInstance.options.iconBaseClass + ' ' +
                e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
        });
    });
</script>
@endsection

@section('styles')
<link href="{{url('mos-panel/vendors/icon-picker/css/fontawesome-iconpicker.min.css')}}" rel="stylesheet">
@endsection
