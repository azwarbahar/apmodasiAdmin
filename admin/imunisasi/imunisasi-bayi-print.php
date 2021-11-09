<?php
require '../../koneksi-v2.php';
$id_bayi = $_GET['id_bayi'];
$bayi = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE id_bayi = '$id_bayi' ");
$dta_bayi = mysqli_fetch_assoc($bayi);
$imunisasi = mysqli_query($conn, "SELECT * FROM tb_imunisasi WHERE bayi_id = '$id_bayi' ");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apmodasi</title>
  <link rel="icon" href="../../assets/dist/img/logo_apmodasi.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-12 invoice-col">
        <br><br>
        <h5 style="text-align: center;">PENCATATAN IMUNISASI RUTIN BAYI DI UNIT PELAYANAN</h5>
        <?php
        $source2 = $dta_bayi['tanggal_lahir_bayi'];
        $date2 = new DateTime($source2);
        $ibu = mysqli_query($conn, "SELECT * FROM tb_bunda WHERE nik_bunda = '$dta_bayi[nik_bunda]' ");
        $dta_ibu = mysqli_fetch_assoc($ibu);

        ?>
        <p style="font-size: 12px;" >
                NAMA&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <?= $dta_bayi['nama_bayi'] ?><br>
                JENIS KELAMIN&emsp;&emsp;&emsp;: <?= $dta_bayi['jenis_kelamin_bayi'] ?><br>
                TANGGAL LAHIR&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $date2->format('d F Y') ; ?><br>
                NAMA BUNDA&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: <?= $dta_ibu['nama_bunda'] ?>
                
        <p style="font-size: 14px; text-align: right; margin-right: 20px;; ">Tanggal : <?= date('l d F Y')?></p>
              </p>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row" style="margin-left: 10px; margin-right: 10px;">
      <div class="col-12 table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th style="text-align: center; width: 10px; font-size: 15px;">No</th>
            <th style="text-align: center; font-size: 15px;">Imunisasi</th>
            <th style="text-align: center; font-size: 15px;">Tanggal</th>
            <th style="text-align: center; font-size: 15px;">Keterangan</th>
          </tr>
          </thead>
          <tbody>

          <?php
                   $i = 1; foreach($imunisasi as $dta) {
                    ?>
                    <tr>
                    <td style="text-align: center; width: 10px; font-size: 15px;"><?= $i ?></td>
                    <td style="font-size: 15px;"> <b> <?= $dta['nama_imunisasi'] ?></b></td>
                    <?php
                      if ($dta['tanggal_imunisasi'] == "-"){
                        $cetak_tanggal = "";
                      } else {
                        $source = $dta['tanggal_imunisasi'];
                        $date = new DateTime($source);
                        $cetak_tanggal = $date->format('d F Y') ;
                      }
                    ?>
                    <td style="text-align: center; font-size: 15px;"><?= $cetak_tanggal ?></td>
                    <td style="text-align: center; font-size: 15px;"> <?= $dta['catatan_imunisasi'] ?></td>
                  </tr>
                  <?php
                  $i = $i + 1; }
                  ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>

    <!-- Berta badan -->
    <div class="row" style="margin-left: 10px; margin-right: 10px;">
      <div class="col-12 table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th style="text-align: center; width: 10px; font-size: 15px;">No</th>
            <th style="text-align: center; font-size: 15px;">Berat Badan</th>
            <th style="text-align: center; font-size: 15px;">Tanggal</th>
            <th style="text-align: center; font-size: 15px;">Keterangan</th>
          </tr>
          </thead>
          <tbody>

          <?php
            $berat = mysqli_query($conn, "SELECT * FROM tb_berat_badan WHERE bayi_id = '$id_bayi' ");
                   $i = 1; foreach($berat as $dta_berat) {
                    ?>
                    <tr>
                    <td style="text-align: center; width: 10px; font-size: 15px;"><?= $i ?></td>
                    <td style="font-size: 15px;"> <b> <?= $dta_berat['nilai_bb'] ?> Kg</b></td>
                    <?php
                      if ($dta_berat['tanggal_bb'] == "-"){
                        $cetak_tanggal = "";
                      } else {
                        $source = $dta_berat['tanggal_bb'];
                        $date = new DateTime($source);
                        $cetak_tanggal1 = $date->format('d F Y') ;
                      }
                    ?>
                    <td style="text-align: center; font-size: 15px;"><?= $cetak_tanggal1 ?></td>
                    <td style="text-align: center; font-size: 15px;"><?= $dta_berat['catatan_bb'] ?></td>
                  </tr>
                  <?php
                  $i = $i + 1; }
                  ?>
          </tbody>
        </table>
      </div>

    </div>

    <!-- Berta badan -->
    <div class="row" style="margin-left: 10px; margin-right: 10px;">
      <div class="col-12 table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th style="text-align: center; width: 10px; font-size: 15px;">No</th>
            <th style="text-align: center; font-size: 15px;">Berat Badan</th>
            <th style="text-align: center; font-size: 15px;">Tanggal</th>
            <th style="text-align: center; font-size: 15px;">Keterangan</th>
          </tr>
          </thead>
          <tbody>

          <?php
            $berat = mysqli_query($conn, "SELECT * FROM tb_berat_badan WHERE bayi_id = '$id_bayi' ");
                   $i = 1; foreach($berat as $dta_berat) {
                    ?>
                    <tr>
                    <td style="text-align: center; width: 10px; font-size: 15px;"><?= $i ?></td>
                    <td style="font-size: 15px;"> <b> <?= $dta_berat['nilai_bb'] ?> Kg</b></td>
                    <?php
                      if ($dta_berat['tanggal_bb'] == "-"){
                        $cetak_tanggal = "";
                      } else {
                        $source = $dta_berat['tanggal_bb'];
                        $date = new DateTime($source);
                        $cetak_tanggal1 = $date->format('d F Y') ;
                      }
                    ?>
                    <td style="text-align: center; font-size: 15px;"><?= $cetak_tanggal1 ?></td>
                    <td style="text-align: center; font-size: 15px;"><?= $dta_berat['catatan_bb'] ?></td>
                  </tr>
                  <?php
                  $i = $i + 1; }
                  ?>
          </tbody>
        </table>
      </div>

    </div>
    
    <div class="row" style="margin-left: 10px; margin-right: 10px;">
            <div class="col-6">
              <p style="margin-top: 20px;">Mengetahui <br>Kepala Puskesmas Pallangga</p><br><br>
              <p> dr. Tri Octaviyani Djam'aa MPH <br> NIP. 19821003 201001 2 037 </p>
            </div>
            <div class="col-6">
              <p style="margin-top: 20px; text-align: right;"><br>Koordinator Imunisasi</p><br><br>
              <p style=" text-align: right;" > Nurlina, A.Md.Kep <br> NIP. 19750505 199703 2 008 </p>
            </div>
          </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript">
  window.addEventListener("load", window.print());
</script>
</body>
</html>
