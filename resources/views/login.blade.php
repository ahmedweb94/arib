<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('assets/admin')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{url('assets/admin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('assets/admin')}}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin/')}}/plugins/toastr/toastr.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|Cute+Font&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tenali+Ramakrishna&display=swap" rel="stylesheet">
</head>
<body class="hold-transition login-page">
@include('includes.msg')
<div class="login-box">
    <div class="login-logo">
        <a>Arib</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Login</p>

            <form action="{{route('login')}}" method="post">
                @csrf
                @if(Session::has('error'))
                    <span class="invalid-feedback border-danger  alert-danger" role="alert"><strong>{{ Session::get('error') }}</strong></span>
                    @endif
                @error('user_data')
                <span class="invalid-feedback border-danger  alert-danger" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                @error('password')
                <span class="invalid-feedback border-danger alert-danger" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                <div class="input-group mb-3">
                    <input type="text" name="user_data" required class="form-control" placeholder="Email/Phone">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" required class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

            {{--<p class="mb-1">--}}
                {{--<a href="{{route('admin.forget-password-view')}}">I forgot my password</a>--}}
            {{--</p>--}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('assets/admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('assets/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('assets/admin')}}/dist/js/adminlte.min.js"></script>
<script src="{{asset('assets/admin/')}}/plugins/toastr/toastr.min.js"></script>
<script>
    @if(Session::has('error'))
    toastr.error('{{Session::get('error')}}');
    @endif
    @if(Session::has('success'))
    toastr.success('{{Session::get('success')}}');
    @endif
    @if ($errors->any())
    toastr.error("<?php
        foreach ($errors->all() as $error) {
            echo $error . '\n';
        }
        ?>");
    @endif
</script>
</body>
</html>
