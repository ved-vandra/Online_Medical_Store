<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E | Meds</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
 
    
    @if (Route::is('edit*'))

      <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="public/../../../css/fontawesome-free-6.0.0-web/css/all.min.css">
      <!-- overlayScrollbars -->
        <link rel="stylesheet" href="public/../../../css/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Theme style -->
        <link rel="stylesheet" href="public/../../../css/adminlte.min.css">   
        
      {{-- jquery links --}}
      
        <script src="public/../../../js/jquery/jquery.min.js"></script>
      <!-- Bootstrap -->
        <script src="public/../../../js/bootstrap.bundle.min.js"></script>
      <!-- overlayScrollbars -->
        <script src="public/../../../js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
        <script src="public/../../../js/adminlte.js"></script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

    @else
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="public/../../css/fontawesome-free-6.0.0-web/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="public/../../css/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="public/../../css/adminlte.min.css">    
        
      {{-- jquery links --}}
      
        <script src="public/../../js/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="public/../../js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="public/../../js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="public/../../js/adminlte.js"></script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

    @endif
    
    
    {{-- <style>
      .change{
        display: none;
      }
    </style> --}}
    
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('authlogout') }}" class="">
          <button class="btn btn-danger">LOGOUT</button>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
      <span class="brand-text font-weight-bold px-5">E | Meds</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="nav-icon fa-solid fa-user text-success"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name; }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('orders') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-list text-info"></i>
                  <p>
                    Orders
                    {{-- @if (Route::is('category'))
                      abc
                    @endif --}}
                  </p>
                </a>
            </li>
          <li class="nav-item @if(request()->is('admin/category*')) menu-open @endif "  >
            <a href="#" class="nav-link @if(request()->is('admin/category*'))  active @endif ">
              <i class="nav-icon fa-brands fa-cuttlefish text-info"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('category') }}" class="nav-link @if(request()->is('admin/category*')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @if(request()->is('admin/subcategory*')) menu-open @endif "  >
            <a href="#" class="nav-link @if(request()->is('admin/subcategory*'))  active @endif ">
              <i class="nav-icon fa-solid fa-s text-info"></i>
              <p>
                Sub-Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('subcategory') }}" class="nav-link @if(request()->is('admin/subcategory*')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Sub-Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @if(request()->is('admin/product*')) menu-open @endif "  >
            <a href="#" class="nav-link @if(request()->is('admin/product*'))  active @endif ">
              <i class="nav-icon fa-solid fa-p text-info"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('product') }}" class="nav-link @if(request()->is('admin/product*')) active @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Product</p>
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

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12  mt-5 py-5">
            @yield('content')
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- ./wrapper -->


</body>
</html>
