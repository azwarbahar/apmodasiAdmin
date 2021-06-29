<?php
require_once '../template/header/header.php';
$masyarakat = mysqli_query($conn, "SELECT * FROM tb_masyarakat");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Bayi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/apmodasi/admin/">Home</a></li>
              <li class="breadcrumb-item active">Data Bayi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <!-- <label for="inputName">Kelurahan</label>
                <div class="row">
                  <div class="col-4">
                    <select class="form-control select2" style="width: 100%;" name="kelurahan_masyarakat" id="kelurahan_masyarakat">
                      <option selected="selected" value="-">- Semua -</option>
                      <option value="Balang Baru">Balang Baru</option>
                      <option value="Barombong">Barombong</option>
                      <option value="Bongaya">Bongaya</option>
                      <option value="Bonto Duri">Bonto Duri</option>
                      <option value="Jongaya">Jongaya</option>
                      <option value="Maccini Sombala">Maccini Sombala</option>
                      <option value="Mangasa">Mangasa</option>
                      <option value="Mannuruki">Mannuruki</option>
                      <option value="Pa'baeng-Baeng">Pa'baeng-Baeng</option>
                      <option value="Parang Tambung">Parang Tambung</option>
                      <option value="Tanjung Merdeka">Tanjung Merdeka</option>
                    </select>
                  </div>

                  <div class="col-8">
                  <a href="invoice-print.html" target="_blank" class="btn btn-info float-right"><i class="fas fa-print"></i> Print</a>
                  </div>

                </div> -->
                <a href="#" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Masyarakat</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Nama Bunda</th>
                    <th>Tanggal Lahir</th>
                    <!-- <th>Imunisasi</th> -->
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td style="text-align:center">1</td>
                    <td>Foto Bayi</td>
                    <td>Nama Bayi</td>
                    <td>Jekel Bayi</td>
                    <td>Nama Bunda</td>
                    <td>1 Januari 2021</td>
                    <!-- <td>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                        </div>
                      </div>
                      <small>8/11</small>
                    </td> -->
                    <td style="text-align:center; width: 20px;">
                      <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                          <i class="fas fa fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <a href="#" class="dropdown-item">QR Code</a>
                          <a href="#" class="dropdown-item">Edit</a>
                          <a href="#" data-toggle="modal" data-target="#modal-danger" class="dropdown-item">Hapus</a>
                        </div>
                      </div>
                    </td>
                  </tr>

                  </tbody>

                </table>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
require '../template/footer/footer.php';
?>