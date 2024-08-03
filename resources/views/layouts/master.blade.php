<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('css')
    @include('includes.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('includes.header')
@include('includes.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    {{--@include('includes.msg')--}}
    @yield('page-header')
    <!-- Main content -->
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('includes.footer')
</div>
@include('includes.js')
@yield('js')
</body>
</html>
