<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Minimart</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Tambahan CSS Custom -->
        <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: #f8f9fc;
        }

        /* Sidebar ramping */
        #accordionSidebar {
            width: 200px;
            min-height: 100vh;
        }

        /* Sidebar modern look */
        .sidebar {
            background: #ffffff;
            border-right: 1px solid #eaeaea;
        }

        .sidebar .nav-item .nav-link {
            color: #333;
            font-weight: 500;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-item .nav-link:hover,
        .sidebar .nav-item .nav-link.active {
            background: linear-gradient(to right, #1de9b6, #1dc4e9);
            color: #ffffff;
            border-radius: 10px;
        }

        .sidebar .sidebar-heading {
            font-weight: bold;
            font-size: 14px;
            color: #1dc4e9;
        }

        .sidebar-brand {
            font-weight: 700;
            font-size: 18px;
            color: #1dc4e9 !important;
        }

        /* Topbar style */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Content area full without margin */
        #content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fc;
        }

        /* Button style */
        .btn-primary {
            background-color: #1dc4e9;
            border-color: #1dc4e9;
        }

        .btn-primary:hover {
            background-color: #1de9b6;
            border-color: #1de9b6;
        }

        /* Card effect */
        .container-fluid .card {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .container-fluid .card:hover {
            transform: translateY(-5px);
        }

        /* Footer style */
        footer {
            background: #fff;
            border-top: 1px solid #eaeaea;
        }

        .container-fluid {
            padding: 30px;
        }
    </style>


</head>

<body id="page-top" class="d-flex flex-column min-vh-100">

  <!-- Page Wrapper -->
  <div id="wrapper" class="flex-grow-1 d-flex">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Minimart</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading text-primary">
        Menu
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Nav Item - Jenis Transaksi  -->
        <li class="nav-item">
        <a class="nav-link" href="/transaksi">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Nama Transaksi</span>
        </a>
        </li>


      <!-- Nav Item - Transaksi Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/jenis-transaksi" data-toggle="collapse" data-target="#collapseTransaksi"
          aria-expanded="true" aria-controls="collapseTransaksi">
          <i class="fas fa-exchange-alt"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilih Transaksi:</h6>
            <a class="collapse-item" href="/pemasukan">Pemasukan</a>
            <a class="collapse-item" href="/pengeluaran">Pengeluaran</a>
          </div>
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/sumberdana">
            <i class="fas fa-fw fa-database"></i>
            <span>Stok</span></a>
            </li>

      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column flex-grow-1">

      <!-- Main Content -->
      <div id="content" class="flex-grow-1">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                      aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="{{ asset('template/img/undraw_profile.svg') }}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="dropdown-item m-0 p-0">
                    @csrf
                    <button type="submit" class="btn btn-link dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                    </button>
                </form>

              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
        <footer class="text-center py-3">
        <div class="container my-auto">
        <div class="text-center my-auto">
            <span>Copyright © Team Minimart created with 💗 {{ date('Y') }}</span>
        </div>
        </div>
        </footer>
        <!-- End Footer -->



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
