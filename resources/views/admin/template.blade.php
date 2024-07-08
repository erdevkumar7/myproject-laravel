@include('admin.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <form action="{{route('admin_logout')}}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('images') . '/' . 'adminlogo.png' }}" alt="AdminLogo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">FoodyAdmin</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images') . '/' . 'user.jpg' }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::User()->name}}</a>
                    </div>
                </div>

                      <!-- Sidebar Menu -->
                   <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('admin_dashboard')}}" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                            </a>                     
                          </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                Pages
                                <i class="fas fa-angle-left right"></i>
                              </p>
                            </a>
                            <ul class="nav">
                              <li class="nav-item">
                                <a href="{{route('product_all')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>All Products</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{route('product_add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Product Add</p>
                                </a>
                              </li>
                            </ul>
                          </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- /.Main Sidebar Container -->

        <!-- Contains page content -->
          @yield('contents')

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>

    @include('admin.footer')
