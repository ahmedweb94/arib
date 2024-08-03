@extends('layouts.master')
@section('title')
   Home
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Home
        </h1>
    </section>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @if(!auth()->user()->user_id)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p>Employee</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{route('employee.index')}}" class="small-box-footer">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p>Department</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-circle"></i>
                        </div>
                        <a href="{{route('department.index')}}" class="small-box-footer">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                @endif
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <p>Task</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <a href="{{route('task.index')}}" class="small-box-footer">
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
