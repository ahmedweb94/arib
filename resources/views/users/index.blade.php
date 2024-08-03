@extends('layouts.master')
@section('title')
    Employee
@endsection
@section('page-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url('employee') }}">Employee</a></li>
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
                            <form action="{{url('employee')}}" id="postFilter" method="get">
                                {{--@csrf--}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name"
                                                   value="{{request('name') }}" class="form-control" placeholder="Name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input type="email" name="email" value="{{request('email')}}" class="form-control" placeholder="Email"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Phone</label>
                                            <input type="text" name="phone" value="{{request('phone')}}" class="form-control" placeholder="Phone"/>
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
                                            <input class="form-control btn btn-success" onclick="window.location.href='{{route('employee.index')}}'"
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
                            <h3 class="card-title">Employee</h3>
                            <div class="card-tools">
                                <a href="{{route('employee.create')}}" class="btn btn-primary">Add</a>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Salary</th>
                                    <th>Manager Name</th>
                                    <th>Full Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><img src="{{$item->image}}" width="50" height="50"></td>
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->last_name}}</td>
                                        <td>{{$item->salary}}</td>
                                        <td>{{$item->manager->fullName}}</td>
                                        <td>{{$item->fullName}}</td>
                                        <td>
                                            <a href="{{ route('employee.edit', $item->id) }}"
                                               class="btn btn-xs btn-outline-secondary ">
                                                <i class="fa fa-edit"></i></a>
                                            <a href="javascript:;" id="elementRow{{ $item->id }}"
                                               data-id="{{ $item->id }}"
                                               data-url="{{ route('employee.destroy', $item->id) }}"
                                               class="removeElement btn btn-xs btn-outline-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            {{--@endcan--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $users->links('pagination::bootstrap-4') }}
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

