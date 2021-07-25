<?php
require '../../koneksi.php';
$tahun_now = date("Y");
$tahun = $_GET['tahun'];
if ($tahun == "All"){
  $bayi = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE status_bayi = 'Active'");
} else {
  $bayi = mysqli_query($conn, "SELECT * FROM tb_bayi WHERE status_bayi = 'Active' AND tahun_bayi = '$tahun' ");
}
?>

<!DOCTYPE HTML>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
<!-- Load paper.css for happy printing -->
<link rel="stylesheet" href="dist/paper.css">

<!-- Set page size here: A5, A4 or A3 -->
<!-- Set also "landscape" if you need -->
<style>@page { size: A4 landscape  }</style>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="A4 landscape"> 
    <section class="sheet padding-10mm">
      <div class="page landscape-parent">
        <div class="landscape">
          <div class="content">
            <h6 style="text-align: center;"><b>PENCATATAN IMUNISASI RUTIN BAYI DI UNIT PELAYANAN</b></h6> <br>
            <p style="font-size: 11px;" >
              NAMA UNIT PELAYANAN KESEHATAN&emsp;: PUSKESMAS SISFO UINAM<br>
              DESA / KELURAHAN&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: KELURAHAN SAINTEK<br>
              PUSKESMAS&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&nbsp;: PUSKESMAS SAMATA<br>
              TAHUN&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&nbsp;&nbsp;: <?= $tahun ?>
              <p style="font-size: 10px; text-align: right; ">Tanggal : <?= date('l d F Y')?></p>
            </p>
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="font-size: 9px; text-align: center; width: 10px">No</th>
                      <th style="font-size: 9px; text-align: center;">Nama</th>
                      <th style="font-size: 9px; text-align: center;">Jenis<br>Kelamin</th>
                      <th style="font-size: 9px; text-align: center;">Tanggal<br>Lahir</th>
                      <th style="font-size: 9px; text-align: center;">Nama Ibu</th>
                    </tr>
                  </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    for ($x = 0; $x <= 200; $x++) { ?>
                      <tr>
                        <td style="font-size: 8px; text-align: center; width: 10px"><?= $i ?></td>
                        <td style="font-size: 8px;">aaa</td>
                        <td style="font-size: 8px;">bbb</td>
                        <td style="font-size: 8px;">ccc</td>
                        <td style="font-size: 8px;">ddd</td>
                      </tr>
                    <?php $i = $i + 1; } ?>
                    </tbody>
                </table>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>
    <section class="sheet padding-10mm"></section>
    <script type="text/javascript">
      window.addEventListener("load", window.print());
    </script>
  </body>
</html>