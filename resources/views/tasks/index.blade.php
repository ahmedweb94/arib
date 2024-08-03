@extends('layouts.master')
@section('title')
    Tasks
@endsection
@section('page-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tasks</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>
                                Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url('task') }}">Tasks</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" id="filterBox">
                        <div class="card-header with-border">
                            <h3 class="card-title"> Filter <i class="fa fa-filter"></i></h3>

                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-card-widget="collapse"
                                        data-toggle="tooltip"
                                        title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-card-widget="remove"
                                        data-toggle="tooltip"
                                        title="" data-original-title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body" style="">
                            <form action="{{url('task')}}" id="postFilter" method="get">
                                {{--@csrf--}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name"
                                                   value="{{request('name') }}" class="form-control"
                                                   placeholder="Name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="">Status..</option>
                                                @foreach(\App\Helper\TaskStatus::arr as $key=>$v)
                                                    <option value="{{$key}}" {{request('status')==$key?'selected':''}}>{{$v}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Employee</label>
                                            <select name="employee_id" class="form-control">
                                                <option value="">Employee..</option>
                                                @foreach($employees as $emp)
                                                    <option value="{{$emp->id}}" {{request('employee_id')==$emp->id?'selected':''}}>{{$emp->fullName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control btn btn-warning" id="searchBtn" type="submit"
                                                   value="Filter">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control btn btn-success"
                                                   onclick="window.location.href='{{route('task.index')}}'"
                                                   type="button"
                                                   value="Reset">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tasks</h3>
                            <div class="card-tools">
                                @if(!auth()->user()->user_id)
                                <a href="{{route('task.create')}}" class="btn btn-primary">Add</a>
                                @endif
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Manager Name</th>
                                    <th>Employee</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->manager->fullName}}</td>
                                        <td>{{$item->employee->fullName}}</td>
                                        <td>{!! $item->statusIcon() !!}</td>
                                        <td>
                                            <a href="{{ route('task.edit', $item->id) }}"
                                               class="btn btn-xs btn-outline-secondary ">
                                                <i class="fa fa-edit"></i></a>
                                            {{--@endcan--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $tasks->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('css')
@endsection
@section('js')
    <script>
    </script>
@endsection

