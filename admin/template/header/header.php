<?php
require('../../koneksi.php');

if (!isset($_SESSION['login_admin'])) {
  header("location: ../../login.php");
}
$get_id_session = $_SESSION['get_id'];
$query_header_admin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '$get_id_session'");
$get_data_admin = mysqli_fetch_assoc($query_header_admin);
$nama_header = $get_data_admin['nama_admin'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apmodasi</title>
  <link rel="icon" href="/apmodasi/assets/dist/img/logo_apmodasi.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/apmodasi/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/apmodasi/assets/plugins/summernote/summernote-bs4.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="/apmodasi/assets/plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/apmodasi/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/apmodasi/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/apmodasi/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

<!-- bootstrap-switch-button -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="/apmodasi/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/apmodasi/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/apmodasi/admin/index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a style="color: white;" class="nav-link" data-toggle="modal" data-target="#modal-default"  href="" role="button">
          <i class="fas fa fa-power-off" style="color: white;"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
<!-- /.navbar -->

<!-- Modal Hapus -->
<div class="modal fade" tabindex="-1" id="modal-default">
<div class="modal-dialog">
  <div class="modal-content bg-default">
    <div class="modal-header">
    
      <h4 class="modal-title"> <i class="fa fa-power-off"></i> Konfirmasi</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Yakin Ingin Keluar ?</p>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
      <a href="/apmodasi/logout.php?logout=true&for=login_admin" type="button" class="btn btn-outline-dark">Keluar</a>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-5">
    <!-- Brand Logo -->
    <a href="/apmodasi/admin/index.php" class="brand-link">
      <img src="/apmodasi/assets/dist/img/logo_apmodasi.png" alt="Logo Kabupaten Soppeng" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Apmodasi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/apmodasi/assets/dist/img/admin/<?= $get_data_admin['foto_admin'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $nama_header ?></a>
          <a href="#"<i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview menu-open">
            <a href="/apmodasi/admin/" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- <li class="nav-header">Setting</li> -->


          <li class="nav-header">Master Data</li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Data Bayi
              <?php
                $bayi_header = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE status_bayi = 'Menunggu'");
                $row_bayi_header = mysqli_num_rows($bayi_header);
                if ($row_bayi_header >= 1){
                  echo '<span class="right badge badge-danger">New</span>';
                }
              ?>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="/apmodasi/admin/bayi/data-terbaru.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terbaru
                    <?php
                      $bayi_header = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE status_bayi = 'Menunggu'");
                      $row_bayi_header = mysqli_num_rows($bayi_header);
                      if ($row_bayi_header >= 1){
                        echo '<span class="badge badge-info right">'.$row_bayi_header.'</span>';
                      }
                    ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/apmodasi/admin/bayi/data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="/apmodasi/admin/bunda/data.php" class="nav-link">
              <i class="nav-icon fa fa-user-plus"></i>
              <p>
                Data Bunda
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/apmodasi/admin/kader/data.php" class="nav-link">
              <i class="nav-icon fa fa-user-plus"></i>
              <p>
                Data Kader
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/apmodasi/admin/imunisasi/data.php?tahun=2021" class="nav-link">
              <i class="nav-icon fa fa-user-plus"></i>
              <p>
                Imunisasi Bayi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/apmodasi/admin/admin/data.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Admin
              </p>
            </a>
          </li>

          <li class="nav-header"></li>
          <li class="nav-header"></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>