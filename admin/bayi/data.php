<?php
require_once '../template/header/header.php';
$bayi = mysqli_query($conn, "SELECT * FROM tb_bayi");
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
              <!-- <div class="card-header"> -->
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
                <!-- <button data-toggle="modal" data-target="#modal-lg" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Bayi</a> -->
              <!-- </div> -->
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
                    <th>Status</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($bayi as $dta) { ?>
                  <tr>
                    <td style="text-align:center"><?= $i ?></td>
                    <td style="text-align: center">
                      <a href="/apmodasi/assets/dist/img/bayi//<?= $dta['foto_bayi'] ?>" data-toggle="lightbox" data-title="Nama : <?= $dta['nama_bayi'] ?>" data-gallery="gallery">
                        <img src="/apmodasi/assets/dist/img/bayi//<?= $dta['foto_bayi'] ?>" border=3 height=60 width=60 class="img-fluid mb-2" alt="red sample"/>
                      </a>
                    </td>
                    <td><?= $dta['nama_bayi'] ?></td>
                    <td><?= $dta['jenis_kelamin_bayi'] ?></td>
                    <td><?= $dta['bunda_id'] ?></td>
                    <td><?= $dta['tanggal_lahir_bayi'] ?></td>
                    <?php
                      if ($dta['status_bayi']=="Active"){
                        echo " <td style='text-align:center'><span class='badge bg-primary'> $dta[status_bayi] </span>";
                      } else{
                        echo " <td style='text-align:center'><span class='badge bg-warning'> $dta[status_bayi] </span>";
                      }
                    ?>
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
                        <?php

                          if ($dta['status_bayi'] == "Menunggu") {
                            echo "<a href='controller.php?aktif_bayi=true&id_bayi=$dta[id_bayi]' class='dropdown-item'>Aktifkan</a>";
                          }

                        ?>
                          <a href="#" class="dropdown-item">Edit</a>
                          <a href="#" data-toggle="modal" data-target="#modal-danger" class="dropdown-item">Hapus</a>
                        </div>
                      </div>
                    </td>
                  </tr>



                  <?php $i = $i + 1; } ?>
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