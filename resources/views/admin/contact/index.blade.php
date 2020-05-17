@extends('admin.layout')
@section('title', 'Kontak')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">Setting</li>
<li class="breadcrumb-item active">Contact</li>
@stop

@section('content')
<!-- /.row-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i>Form Contact
                @if (count($models) < 4)
                <a href="{{ route('admin.contact.create') }}" class="btn btn-success pull-right"><i
                        class="fa fa-plus"></i> Add Contact</a>
                @endif
            </div>
            <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                @endif
                <table class="table table-responsive-sm table-striped table-vertical-align">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 20px;">No</th>
                            <th>City</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($models as $key => $model)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{$model->city}}</td>
                            <td>{{$model->email}}</td>
                            <td>{{$model->phone}}</td>
                            <td>{{$model->address}}</td>
                            <td>{!! $model->used ? "<span class='badge badge-success'>Used</span>" : "<span class='badge badge-danger'>Not
                                Used</span>" !!}<br></td>
                            <td>
                                <!-- /btn-group-->
                                <div class="btn-group">
                                    <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                        style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="{{ route('admin.contact.edit', $model->id) }}">Edit</a>
                                        @if (!$model->used)
                                        <form action="{{ route('admin.contact.use', $model->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <button class="dropdown-item">Use</button>
                                        </form>
                                        @endif
                                        <form action="{{ route('admin.contact.destroy', $model->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button class="dropdown-item">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /btn-group-->
                            </td>
                        </tr>
                        @endforeach
                        @if ($models->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center"> <b>Table Was Empty</b> </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $models->links() }}
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<!-- /.row-->
@stop
