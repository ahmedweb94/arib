@extends('layouts.master')
@section('title')
    Department
@endsection
@section('page-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Department</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/home') }}">
                                <i class="fa fa-dashboard"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ url('department') }}">Department</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <!-- Main content -->
    <form class="submission-form6 form" method="POST"
          action="{{ isset($department)?route('department.update',$department->id):route('department.store') }}"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        @isset($department)
            {{ method_field('PUT') }}
        @endisset
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Department</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name"
                                           value="{{isset($department)?$department->name: old('name') }}"
                                           class="form-control" required minlength="2" maxlength="100"
                                           placeholder="Name"/>
                                </div>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback"> {{ $errors->first('name') }}</span>
                                @endif
                            <!-- /.card-body -->
                                <div class="card-footer text-right">
                                    <button type="submit" id="btn-submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('department.index') }}" class="btn btn-secondary"> Cancel</a>
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
    </form>
    <!-- /.content -->
@endsection
@section('css')
@endsection
@section('js')

    <!-- Summernote -->
    <script>
        $('.form').validate({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    </script>
@endsection

