@extends('layouts.master')
@section('title')
    Task
@endsection
@section('page-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Task</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/home') }}">
                                <i class="fa fa-dashboard"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ url('task') }}">Task</a>
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
          action="{{ isset($task)?route('task.update',$task->id):route('task.store') }}"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        @isset($task)
            {{ method_field('PUT') }}
        @endisset
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Task</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if(isset($task) && $task?->employee_id==auth()->id())
                                    <div class="form-group">
                                        <label>Name </label>
                                        <input type="text"
                                               value="{{$task->name}}"
                                               class="form-control" disabled
                                               placeholder="Name"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Description </label>
                                        <input type="text"
                                               value="{{$task->description}}"
                                               class="form-control" disabled
                                               placeholder="Name"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <select name="status" class="form-control" required>
                                            @foreach(\App\Helper\TaskStatus::arr as $key=>$v)
                                                <option
                                                    value="{{$key}}" {{$task->status==$key?'selected':''}}>{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('status'))
                                        <span class="error invalid-feedback"> {{ $errors->first('status') }}</span>
                                    @endif
                                @else
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name"
                                           value="{{isset($task)?$task->name: old('name') }}"
                                           class="form-control" required minlength="3" maxlength="100"
                                           placeholder="Name"/>
                                </div>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback"> {{ $errors->first('name') }}</span>
                                @endif
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"
                                              placeholder="Description">
                                        {{isset($task)?$task->description:old('description')}}
                                    </textarea>
                                </div>
                                @if($errors->has('description'))
                                    <span class="error invalid-feedback"> {{ $errors->first('description') }}</span>
                                @endif
                                <div class="form-group">
                                    <label>Employee *</label>
                                    <select name="employee_id" class="form-control" required>
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}"
                                            @isset($task)
                                                {{$task->employee_id==$employee->id?'selected':''}}
                                                @endisset
                                            >{{$employee->fullName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if($errors->has('employee_id'))
                                    <span class="error invalid-feedback"> {{ $errors->first('employee_id') }}</span>
                                @endif
                                    @endif
                            </div>

                        <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <button type="submit" id="btn-submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('task.index') }}" class="btn btn-secondary"> Cancel</a>
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

