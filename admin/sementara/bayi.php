<?php
require_once '../template/header/header.php';
$bayi = mysqli_query($conn, "SELECT * FROM tb_bayi ORDER BY id_bayi DESC");
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
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
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
                <a href="tambah-bayi.php" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Bayi</a>
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
                    <th>Status</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($bayi as $dta) { ?>
                  <tr>
                    <td style="text-align:center"><?= $i ?></td>
                    <td style="text-align: center">
                      <a href="../../assets/dist/img/bayi//<?= $dta['foto_bayi'] ?>" data-toggle="lightbox" data-title="Nama : <?= $dta['nama_bayi'] ?>" data-gallery="gallery">
                        <img src="../../assets/dist/img/bayi//<?= $dta['foto_bayi'] ?>" border=3 height=60 width=60 class="img-fluid mb-2" alt="red sample"/>
                      </a>
                    </td>
                    <td><?= $dta['nama_bayi'] ?></td>
                    <td><?= $dta['jenis_kelamin_bayi'] ?></td>
                    <?php
                      $bunda = mysqli_query($conn, "SELECT * FROM tb_bunda WHERE id_bunda = '$dta[bunda_id]'");
                      $get_bunda = mysqli_fetch_assoc($bunda);
                    ?>
                    <td><?= $get_bunda['nama_bunda'] ?></td>
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
                            echo "<a href='controller.php?aktif_bayi=true&id_bayi=$dta[id_bayi]' class='dropdown-item'>Aktifkan</a>
                                  <a href='#' data-toggle='modal' data-target='#modal-danger$dta[id_bayi]' class='dropdown-item'>Hapus</a>
                            ";
                          } else {
                            echo "<a href='#' data-toggle='modal' data-target='#modal-danger$dta[id_bayi]' class='dropdown-item'>Hapus</a>
                            ";
                          }

                        ?>
                        </div>
                      </div>
                    </td>
                  </tr>

      <!-- Modal Hapus -->
      <div class="modal fade" id="modal-danger<?= $dta['id_bayi'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data Bayi?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Data Bayi</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_bayi=true&id_bayi=<?= $dta['id_bayi'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



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