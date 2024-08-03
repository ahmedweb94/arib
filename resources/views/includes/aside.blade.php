<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        {{--<img src="{{asset('assets/admin/')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"--}}
             {{--class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        <img src="{{asset('storage/logo.png')}}" alt=""
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Arib</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/admin/')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{__(auth()->user()->name)}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i style="color: #fff9f8" class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Home</p>
                    </a>
                </li>
                @if(!auth()->user()->user_id)
                <li class="nav-item">
                    <a href="{{route('employee.index')}}" class="nav-link">
                        <i style="color: #ffc107" class="nav-icon fas fa-users"></i>
                        <p>Employee</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('department.index')}}" class="nav-link">
                        <i style="color: #28a745" class="nav-icon fas fa-circle"></i>
                        <p>Department</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('task.index')}}" class="nav-link">
                        <i style="color: #17a2b8" class="nav-icon fas fa-tasks"></i>
                        <p>Task</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
