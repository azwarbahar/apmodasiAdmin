<?php
require_once '../template/header/header.php';
$bayi = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE status_bayi = 'Active' ");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Imunisasi Bayi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/apmodasi/admin/">Home</a></li>
              <li class="breadcrumb-item active">Imunisasi Bayi</li>
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
                <h5 style="text-align: center;"><b>PENCATATAN IMUNISASI RUTIN BAYI DI UNIT PELAYANAN</b></h5> <br>
                <p>NAMA UNIT PELAYANAN KESEHATAN&emsp;: PUSKESMAS SISFO UINAM<br>
                DESA / KELURAHAN&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: KELURAHAN SAINTEK<br>
                PUSKESMAS&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&nbsp;: PUSKESMAS SAMATA<br>
                TAHUN&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&nbsp;&nbsp;: 2021</p>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow: scroll; max-height: 600px; ">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th style="font-size: 16px; text-align: center; color: blue;">No</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">Foto</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">Nama</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">Jenis Kelamin</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">Tanggal Lahir</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">Nama Ibu</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">HBO</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">BCG</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">Polio 1</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">DPT-HB-Hib 1</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">Polio 2</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">DPT-HB-Hib 2</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">Polio 3</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">DPT-HB-Hib 3</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">Polio 4</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">IPV</th>
                    <th style="font-size: 16px; text-align: center; color: blue;">Campak</th>
                    <!-- <th style="font-size: 16px; text-align: center; color: blue;"></th> -->
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
                    <td style="font-size: 16px;"><?= $dta['nama_bayi'] ?></td>
                    <?php
                      if ( $dta['jenis_kelamin_bayi'] == "Laki - laki	"){
                        echo "<td style='text-align: center; font-size: 16px;'>L</td>";
                      } else {
                        echo "<td style='text-align: center; font-size: 16px;'>P</td>";
                      }
                    ?>
                    <td style="font-size: 16px;"><?= $dta['tanggal_lahir_bayi']?></td>
                    <?php
                      $bunda = mysqli_query($conn, "SELECT * FROM tb_bunda WHERE id_bunda = '$dta[bunda_id]'");
                      $get_bunda = mysqli_fetch_assoc($bunda);
                    ?>
                    <td style="font-size: 16px;"><?= $get_bunda['nama_bunda'] ?></td>
                    <?php
                      $imunisasi = mysqli_query($conn, "SELECT * FROM tb_imunisasi WHERE bayi_id = '$dta[id_bayi]'");
                      foreach($imunisasi as $dta_imunisasi) {
                        if ($dta_imunisasi['status_imunisasi'] == "Sudah"){
                          echo " <td style='text-align:center; font-size: 16px;'><span class='badge bg-success' type='button' data-toggle='modal' data-target='#modal-sm$dta_imunisasi[id_imunisasi]' > Sudah </span>";
                        } else {
                          echo "<td style='font-size: 16px; text-align:center;'>-</td>";
                        }
                        ?>

                          <div class="modal fade" id="modal-sm<?= $dta_imunisasi['id_imunisasi'] ?>">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Kader</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                      $kader = mysqli_query($conn, "SELECT * FROM tb_kader WHERE id_kader = '$dta_imunisasi[kader_id]'");
                                      $get_kader = mysqli_fetch_assoc($kader);
                                    ?>
                                    <div class="text-center">
                                      <img class="profile-user-img img-fluid img-circle"
                                          src="/apmodasi/assets/dist/img/kader/<?= $get_kader['foto_kader']  ?>"
                                          alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center"><?= $get_kader['nama_kader'] ?></h3>
                                    <p class="text-muted text-center"><?= $get_kader['nip_kader'] ?></p>
                                  <!-- /.card-body -->
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->

                        <?php
                      }
                    ?>
                    <!-- <td style="text-align:center; width: 20px;">
                      <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                          <i class="fas fa fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <?php

                          if ($dta['status_bayi'] == "Menunggu") {
                            echo "<a href='controller.php?aktif_bayi=true&id_bayi=$dta[id_bayi]' class='dropdown-item'>Aktifkan</a>
                                  <a href='#' data-toggle='modal' data-target='#modal-danger<?= $dta[id_bayi] ?>' class='dropdown-item'>Hapus</a>
                            ";
                          } else {
                            echo "<a href='#' data-toggle='modal' data-target='#modal-danger<?= $dta[id_bayi] ?>' class='dropdown-item'>Hapus</a>
                            ";
                          }
                        ?>
                        </div>
                      </div>
                    </td> -->
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