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
                        <li class="breadcrumb-item">
                            <a href="{{ url('/home') }}">
                                <i class="fa fa-dashboard"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ url('employee') }}">Employee</a>
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
          action="{{ isset($employee)?route('employee.update',$employee->id):route('employee.store') }}"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        @isset($employee)
            {{ method_field('PUT') }}
        @endisset
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Employee</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                    <div class="form-group">
                                        <label>First Name *</label>
                                        <input type="text" name="first_name"
                                               value="{{isset($employee)?$employee->first_name: old('first_name') }}"
                                               class="form-control" required minlength="3" maxlength="100"
                                               placeholder="First Name"/>
                                    </div>
                                    @if($errors->has('first_name'))
                                        <span class="error invalid-feedback"> {{ $errors->first('first_name') }}</span>
                                    @endif
                                <div class="form-group">
                                        <label>Last Name *</label>
                                        <input type="text" name="last_name"
                                               value="{{isset($employee)?$employee->last_name: old('last_name') }}"
                                               class="form-control" required minlength="3" maxlength="100"
                                               placeholder="Last Name"/>
                                    </div>
                                    @if($errors->has('last_name'))
                                        <span class="error invalid-feedback"> {{ $errors->first('last_name') }}</span>
                                    @endif
                                <div class="form-group">
                                        <label>Phone *</label>
                                        <input type="text" name="phone"
                                               value="{{isset($employee)?$employee->phone: old('phone') }}"
                                               class="form-control" required placeholder="Phone"/>
                                    </div>
                                    @if($errors->has('phone'))
                                        <span class="error invalid-feedback"> {{ $errors->first('phone') }}</span>
                                    @endif
                                <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" name="email"
                                               value="{{isset($employee)?$employee->email: old('email') }}"
                                               class="form-control" required placeholder="Email"/>
                                    </div>
                                    @if($errors->has('email'))
                                        <span class="error invalid-feedback"> {{ $errors->first('email') }}</span>
                                    @endif
                                <div class="form-group">
                                        <label>Password *</label>
                                        <input type="password" name="password"
                                               class="form-control" {{isset($user)?'required':''}} minlength="8" maxlength="100" placeholder="Password"/>
                                    </div>
                                    @if($errors->has('password'))
                                        <span class="error invalid-feedback"> {{ $errors->first('password') }}</span>
                                    @endif
                                <div class="form-group">
                                        <label>Password Confirmation *</label>
                                        <input type="password" name="password_confirmation" minlength="8" maxlength="100"
                                               class="form-control" {{isset($user)?'required':''}} placeholder="Password Confirmation"/>
                                    </div>
                                    @if($errors->has('password_confirmation'))
                                        <span class="error invalid-feedback"> {{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                <div class="form-group">
                                        <label>Salary *</label>
                                        <input type="number" name="salary"
                                               value="{{isset($employee)?$employee->salary: old('salary') }}"
                                               class="form-control" required min="1" placeholder="Salary"/>
                                    </div>
                                    @if($errors->has('salary'))
                                        <span class="error invalid-feedback"> {{ $errors->first('salary') }}</span>
                                    @endif
                                <div class="form-group">
                                        <label>Manager *</label>
                                    <select name="user_id" class="form-control" required>
                                        @foreach($managers as $manager)
                                            <option value="{{$manager->id}}"
                                            @isset($employee)
                                                {{$employee->user_id==$manager->id?'selected':''}}
                                                @endisset
                                            >{{$manager->fullName}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    @if($errors->has('user_id'))
                                        <span class="error invalid-feedback"> {{ $errors->first('user_id') }}</span>
                                    @endif
                                <div class="form-group">
                                        <label>Department *</label>
                                    <select name="department_id" class="form-control" required>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}"
                                            @isset($employee)
                                                {{$employee->department_id==$department->id?'selected':''}}
                                                @endisset
                                            >{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    @if($errors->has('department_id'))
                                        <span class="error invalid-feedback"> {{ $errors->first('department_id') }}</span>
                                    @endif

                                <div class="form-group">
                                    <label>Image </label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="">
                                            {{--<label class="custom-file-label" for="customFile">{{__('admin.image')}}</label>--}}
                                        </div>
                                        @isset($employee)
                                            <img src="{{$employee->image}}" width="100" height="100">
                                        @endisset
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <button type="submit" id="btn-submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('employee.index') }}" class="btn btn-secondary"> Cancel</a>
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

