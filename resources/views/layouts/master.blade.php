<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INVENTORY</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/css/adminlte.min.css">

  {{-- fontwasome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <!-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
    <img class="img-profile rounded-circle"
                      src="{{ asset('admin_assets') }}/dist/img/avatar5.png" height="30" width="30">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>

      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->

          </li>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-white-600 small"><b>Admin</b></span>
                  <img class="img-profile rounded-circle"
                      src="{{ asset('admin_assets') }}/dist/img/avatar5.png" height="30" width="30">
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                  </a>
                  <a class="dropdown-item" href="#">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Settings
                  </a>
                  <a class="dropdown-item" href="#">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      Activity Log
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ asset('admin_assets') }}/../Admin_Login/login-form-20/index.html" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                  </a>
              </div>
          </li>

        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div>
      <div class="modal-body">Are you sure you want to logout</div>
      <div class="modal-footer">

          {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="">Logout</a> --}}
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">Logout</a>
        </form>
      </div>
  </div>
  </div>
  </div>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#062541;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-info">
      <img src="{{ asset('admin_assets') }}/dist/img/avatar5.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light font-weight-bold">INVENTORY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ url('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('supplier') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Supplier Manage</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('customer') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Customer Manage</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('catagory') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Catagory Manage</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('subcatagory') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Sub Catagory Manage</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('product') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Products Manage</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('purchase') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Purchase Manage</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('sales') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Sales Manage</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Return Manage</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Return Details Manage</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ url('company') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Company Details</p>
            </a>
          </li>
          <li class="nav-header">PAYMENT MANAGE</li>
          <li class="nav-item">
            <a href="{{ url('SupplierPaymentList') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Payment to Supplier</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('customerPaymentList') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Payment to Customer</p>
            </a>
          </li>
          <li class="nav-header">Reports</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                All Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('supplierledger') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Supplier Ledger Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('customerledger') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Customer Ledger Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('stockledeger') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Ledger Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('purchasereport') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('salesreports') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('supplierPaymentLedger') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier Ledger</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('customerPaymentLedger') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Ledger</p>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
      @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer justify-content-center">
    <strong>Copyright &copy; 2022-2023 PWAD-53.</strong>
    All rights reserved.
    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin_assets') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin_assets') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{ asset('admin_assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('admin_assets') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('admin_assets') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('/') }}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin_assets') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin_assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('admin_assets') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin_assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_assets') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin_assets') }}/dist/js/pages/dashboard.js"></script>


<!-- DataTables  & Plugins -->
<script src="{{ asset('admin_assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
 <!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": ["pdf", "print"]
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
@yield('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/> --}}

</html>
