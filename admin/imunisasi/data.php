<?php
require_once '../template/header/header.php';
$tahun_now = date("Y");
$tahun = $_GET['tahun'];
if ($tahun == "All"){
  $bayi = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE status_bayi = 'Active'");
} else {
  $bayi = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE status_bayi = 'Active' AND tahun_bayi = '$tahun' ");
}
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
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
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
                TAHUN</p>
                <form method="POST" action="cont.php" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-3">
                    <select class="form-control select2" style="width: 100%;" name="tahun_select" id="tahun_select">
                      <?php
                        if ($tahun == "All"){
                          echo '
                              <option selected="selected" value="All">- Semua -</option>
                              <option value="2021">2021</option>
                              <option value="2020">2020</option>
                              <option value="2019">2019</option>
                          ';
                        } else if ($tahun == "2021"){
                          echo '
                              <option value="All">- Semua -</option>
                              <option selected="selected" value="2021">2021</option>
                              <option value="2020">2020</option>
                              <option value="2019">2019</option>
                          ';
                        }  else if ($tahun == "2020"){
                          echo '
                              <option value="All">- Semua -</option>
                              <option  value="2021">2021</option>
                              <option selected="selected" value="2020">2020</option>
                              <option value="2019">2019</option>
                          ';
                        } else if ($tahun == "2019"){
                          echo '
                              <option value="All">- Semua -</option>
                              <option value="2021">2021</option>
                              <option value="2020">2020</option>
                              <option selected="selected" value="2019">2019</option>
                          ';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-2">
                    <button type="submit" name="cari_tahun" class="btn btn-info"><i class="fas fa-search"></i></button>
                  </div>
                  <div class="col-7">
                  <a href="imunisasi-print.php?tahun=<?= $tahun ?>" target="_blank" class="btn btn-info float-right"><i class="fas fa-print"></i> Cetak</a>
                  </div>
                </div>
                </form>
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
                    <th style="font-size: 16px; text-align: center; color: blue;"></th>
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
                                          src="../../assets/dist/img/kader/<?= $get_kader['foto_kader']  ?>"
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
                    <td>
                  <a href="imunisasi-bayi-print.php?id_bayi=<?= $dta['id_bayi'] ?>" target="_blank" class="btn btn-info btn-xs"><i class="fas fa-print"></i></a></td>
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