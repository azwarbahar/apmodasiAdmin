<?php
require_once '../template/header/header.php';

$id_bayi = $_GET['id_bayi'];
$result = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE id_bayi = '$id_bayi'");
$dta = mysqli_fetch_assoc($result);
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Imunisasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10" style="left: 10px">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $dta['nama_bayi'] ?> TTL <?= $dta['tanggal_lahir_bayi'] ?></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">
                <?php
                    $imunisasi = mysqli_query($conn, "SELECT * FROM tb_imunisasi WHERE bayi_id = '$dta[id_bayi]' AND nama_imunisasi != 'IPV'");
                    foreach($imunisasi as $dta_imunisasi) {
                ?>
                <div class="form-group">

                    <label for="inputName" class="bg-warning"> <?= $dta_imunisasi['nama_imunisasi'] ?> </label>
                    <div class="row">
                    <div class="col-3">
                        <input type="date" class="form-control" name="tanggal<?= $dta_imunisasi['no_imunisasi'] ?>">
                    </div>
                    <div class="col-6">
                        <input type="text" placeholder="Keterangan" name="keterangan<?= $dta_imunisasi['no_imunisasi'] ?>"class="form-control">
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="inputName">USIA (bulan)</label>
                            <input type="number" name="usia<?= $dta_imunisasi['no_imunisasi'] ?>"class="form-control">
                        </div>
                        <div class="col-4">
                            <label for="inputName">Kader</label>
                            <select class="form-control select2" style="width: 100%;" name="kader<?= $dta_imunisasi['no_imunisasi'] ?>">
                                <option selected="selected" value="1">---- Pilih ----</option>
                                <?php
                                $result=mysqli_query($conn,'SELECT * FROM tb_kader');
                                while($row=mysqli_fetch_assoc($result)) {
                                    echo "<option value='$row[id_kader]'>$row[nama_kader]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <hr><br>
                <?php } ?>

                <div class="col-12">
                    <input type="hidden" value="<?= $dta['id_bayi'] ?>" name="id_bayi">
                    <button type="submit" name="submit_imunisasi" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
                    <a href="data.php?tahun=All" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
                </div>
            </form>
            </div>
            <!-- /.card-body -->

            <br>
          </div>
          <!-- /.card -->


        </div>
      </div>
    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->


<?php
require '../template/footer/footer.php';
?>