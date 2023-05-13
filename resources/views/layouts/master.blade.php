<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Sistem Pakar</title>


  <!-- Custom fonts for this template-->
  <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}

  <!-- Custom styles for this template-->
  <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
  {{-- datatables --}}
  @yield('style')

</head>
@if (Auth::check()&& Auth::user()->level == 'admin')
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon n-15">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Dhasboard</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin-home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="/pasien">
          <i class="fas fa-address-book"></i>
          <span>Data Rekam medis </span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="/dashboard/penyakit">
          <i class="fas fa-folder-open pr-2"></i>
          <span>Data Penyakit </span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard/gejala">
          <i class=" fab fa-accusoft"></i>
          <span>Data Gejala </span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard/basecase">
          <i class="fas fa-clipboard-list"></i>
          <span>Data Base Case </span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/solusi">
          <i class="fas fa-clipboard-list"></i>
          <span>Data solusi </span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/blog-pakar-admin">
          <i class="fas fa-clipboard-list"></i>
          <span> Blog Pakar</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/klinik-admin">
          <i class="fas fa-clipboard-list"></i>
          <span>Data Klinik & Apotik</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/kontak">
          <i class="fas fa-clipboard-list"></i>
          <span>Api WhatsApp</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="/user/id">
          <i class="far fa-user pr-2"></i>
          <span>User Manajemen </span></a>
      </li>
      @endif
     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>

            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            @if (Auth::check())
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset('sb-admin/img/user.png') }}">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item"href="/change-password">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </a>
              </div>
            </li>
            @endif
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
          @yield('page-content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;Ririin Muhlis - Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>

   <!-- Page level plugins -->
   <script src="{{ asset('sb-admin/vendor/chart.js/Chart.min.js') }}"></script>

   {{-- <!-- Page level custom scripts -->
   <script src="{{ asset('sb-admin/js/demo/chart-area-demo.js') }}"></script>
   <script src="{{ asset('sb-admin/js/demo/chart-pie-demo.js') }}"></script> --}}

 {{-- datatable --}}
   @yield('script')

</body>

</html>
