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
<style>@page { size: A4 landscape }</style>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- <style>
      body {
        margin: 0;
        background: #CCCCCC;
      }

      div.page {
        margin: 10px auto;
        border: solid 1px black;
        display: block;
        page-break-after: always;
        width: 209mm;
        height: 296mm;
        overflow: hidden;
        background: white;
      }

      div.landscape-parent {
        width: 296mm;
        height: 209mm;
      }

      div.landscape {
        width: 296mm;
        height: 209mm;
      }

      div.content {
        padding: 10mm;
      }

      body,
      div,
      td {
        font-size: 13px;
        font-family: Verdana;
      }

      @media print {
        body {
          background: none;
        }
        div.page {
          width: 209mm;
          height: 296mm;
        }
        div.landscape {
          transform: rotate(270deg) translate(-296mm, 0);
          transform-origin: 0 0;
        }
        div.portrait,
        div.landscape,
        div.page {
          margin: 0;
          padding: 0;
          border: none;
          background: none;
        }
      }
    </style> -->
  </head>
  <body class="A4 landscape"> 
    <section class="sheet padding-10mm">
      <div class="page landscape-parent">
      <div class="landscape">
        <div class="content">
                <h6 style="text-align: center;"><b>PENCATATAN IMUNISASI RUTIN BAYI DI UNIT PELAYANAN</b></h6> <br>
                <p style="font-size: 11px;" >
                NAMA UNIT PELAYANAN KESEHATAN&emsp;: PUSKESMAS PALLANGGA<br>
                DESA / KELURAHAN&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: TETEBATU<br>
                PUSKESMAS&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&nbsp;: PUSKESMAS PALLANGGA<br>
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
                    <th style="font-size: 9px; text-align: center;">HBO</th>
                    <th style="font-size: 9px; text-align: center;">BCG</th>
                    <th style="font-size: 9px; text-align: center;">Polio 1</th>
                    <th style="font-size: 9px; text-align: center;">DPT-HB-Hib 1</th>
                    <th style="font-size: 9px; text-align: center;">Polio 2</th>
                    <th style="font-size: 9px; text-align: center;">DPT-HB-Hib 2</th>
                    <th style="font-size: 9px; text-align: center;">Polio 3</th>
                    <th style="font-size: 9px; text-align: center;">DPT-HB-Hib 3</th>
                    <th style="font-size: 9px; text-align: center;">Polio 4</th>
                    <!-- <th style="font-size: 9px; text-align: center;">IPV</th> -->
                    <th style="font-size: 9px; text-align: center;">Campak</th>
                  </tr>
                </thead>
                  <tbody>
                  <?php $i = 1; foreach($bayi as $dta) { ?>
                    <tr>
                      <td style="font-size: 8px; text-align: center; width: 10px"><?= $i ?></td>
                      <td style="font-size: 8px;"><?= $dta['nama_bayi'] ?></td>
                      <?php
                        if ( $dta['jenis_kelamin_bayi'] == "Laki - laki	"){
                          echo "<td style='text-align: center; font-size: 8px;'>L</td>";
                        } else {
                          echo "<td style='text-align: center; font-size: 8px;'>P</td>";
                        }
                        $source = $dta['tanggal_lahir_bayi'];
                        $date = new DateTime($source);
                      ?>
                      <td style="font-size: 8px;"><?= $date->format('d/m/Y')?></td>
                      <?php
                        $bunda = mysqli_query($conn, "SELECT * FROM tb_bunda WHERE id_bunda = '$dta[bunda_id]'");
                        $get_bunda = mysqli_fetch_assoc($bunda);
                      ?>
                      <td style="font-size: 8px;"><?= $get_bunda['nama_bunda'] ?></td>
                      <?php
                        $imunisasi = mysqli_query($conn, "SELECT * FROM tb_imunisasi WHERE bayi_id = '$dta[id_bayi]' AND nama_imunisasi != 'IPV'");
                        foreach($imunisasi as $dta_imunisasi) {
                          if ($dta_imunisasi['status_imunisasi'] == "Sudah"){
                            $source2 = $dta_imunisasi['tanggal_imunisasi'];
                            $date2 = new DateTime($source2);
                            echo " <td style='text-align:center; font-size: 8px;'>". $date->format('d/m/Y') ." </span>";
                          } else {
                            echo "<td style='font-size: 8px; text-align:center;'></td>";
                          }
                        }
                          ?>
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
    <script type="text/javascript">
      window.addEventListener("load", window.print());
    </script>
  </body>
</html>