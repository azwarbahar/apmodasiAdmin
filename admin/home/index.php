
<?php

require '../template/header/header.php';
// $result= mysqli_query($conn,'SELECT * FROM tb_hasil_akhir_mahasiswa');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
                <div class="callout callout-danger">
                  <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                  <h5><i class="icon fas fa-info"></i> Welcome Back!</h5>
                  Selamat Datang <b><?= $nama_header ?></b>
                </div>

        <!-- Small boxes (Stat box) -->
        <br>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="ion ion-person-add"></i></span>

              <div class="info-box-content">
                <?php
                  $bayi_home = mysqli_query($conn, "SELECT * FROM tb_bayi");
                  $row_bayi_home = mysqli_num_rows($bayi_home);
                  $row_bayi_home_final = $row_bayi_home;
                ?>
                <span class="info-box-text">Data Bayi</span>
                <span class="info-box-number"><?= $row_bayi_home_final ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="ion ion-person-add"></i></span>

              <div class="info-box-content">
                <?php
                  $bunda_home = mysqli_query($conn, "SELECT * FROM tb_bunda");
                  $row_bunda_home = mysqli_num_rows($bunda_home);
                  $row_bunda_home_final = $row_bunda_home;
                ?>
                <span class="info-box-text">Data Bunda</span>
                <span class="info-box-number"><?= $row_bunda_home_final ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-id-badge"></i></span>

              <div class="info-box-content">
                <?php
                  $kader_home = mysqli_query($conn, "SELECT * FROM tb_kader");
                  $row_kader_home = mysqli_num_rows($kader_home);
                  $row_kader_home_final = $row_kader_home;
                ?>
                <span class="info-box-text">Data Kader</span>
                <span class="info-box-number"><?= $row_kader_home_final ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="ion ion-person"></i></span>

              <div class="info-box-content">
                <?php
                  $admin_home = mysqli_query($conn, "SELECT * FROM tb_admin");
                  $row_admin_home = mysqli_num_rows($admin_home);
                  $row_admin_home_final = $row_admin_home;
                ?>
                <span class="info-box-text">Data Admin</span>
                <span class="info-box-number"><?= $row_admin_home_final ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <br>

        <div class="row">
           <div class="col-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Data imunisasi Laki-laki</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-grafik-tab" data-toggle="pill" href="#custom-tabs-two-grafik" role="tab" aria-controls="custom-tabs-two-grafik" aria-selected="true">Grafik</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-tabel-tab" data-toggle="pill" href="#custom-tabs-two-tabel" role="tab" aria-controls="custom-tabs-two-tabel" aria-selected="false">Tabel</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <!-- GRAFIK -->
                  <div class="tab-pane fade show active" id="custom-tabs-two-grafik" role="tabpanel" aria-labelledby="custom-tabs-two-grafik-tab">
                    <div id="container22"></div>
                  </div>
                  <!-- TABEL -->
                  <div class="tab-pane fade" id="custom-tabs-two-tabel" role="tabpanel" aria-labelledby="custom-tabs-two-tabel-tab">
                    <div class="card-body p-0">
                      <table class="table table-bordered" id="datatable1">
                        <thead>
                          <tr>
                            <th></th>
                            <th>BCG</th>
                            <th>Polio 1</th>
                            <th>DPT-HB-Hib 1</th>
                            <th>Polio 2</th>
                            <th>DPT-HB-Hib 2</th>
                            <th>Polio 3</th>
                            <th>DPT-HB-Hib 3</th>
                            <th>Polio 4</th>
                            <th>Campak</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $imunisasi_tahun = mysqli_query($conn, "SELECT * FROM tb_imunisasi GROUP BY YEAR(tanggal_imunisasi) ");
                              foreach($imunisasi_tahun as $dta_imunisasi_tahun) {
                            ?>
                            <?php
                              if ($dta_imunisasi_tahun['tanggal_imunisasi'] != "-"){
                            ?>
                          <tr>
                            <?php
                              $tahun_ini = substr($dta_imunisasi_tahun['tanggal_imunisasi'],0,4);
                            ?>
                            <th><?=  $tahun_ini ?></th>
                            <?php
                              $imunisasi_array = array("BCG", "Polio 1", "DPT-HB-Hib 1", "Polio 2",
                                                      "DPT-HB-Hib 2", "Polio 3", "DPT-HB-Hib 3",
                                                      "Polio 4", "CAMPAK");
                              foreach ($imunisasi_array as $dta_imunisasi_array){
                                $result_imun = mysqli_query($conn,"SELECT * FROM tb_imunisasi WHERE nama_imunisasi = '$dta_imunisasi_array' AND
                                                                    jenis_kelamin_bayi_imunisasi = 'Laki - laki' AND status_imunisasi = 'Sudah' AND year(tanggal_imunisasi) =  $tahun_ini ");
                                $row_imun = mysqli_num_rows($result_imun);
                                ?>
                                <td style="text-align:center"><?= $row_imun ?></td>
                                <?php
                              }
                            ?>
                          </tr>
                            <?php
                                }
                              }
                            ?>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <br>

        
        <div class="row">
           <div class="col-12">
            <div class="card card-warning card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Data imunisasi Perempuan</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-grafik-tab-warning" data-toggle="pill" href="#custom-tabs-two-grafik-warning" role="tab" aria-controls="custom-tabs-two-grafik-warning" aria-selected="true">Grafik</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-tabel-tab-warning" data-toggle="pill" href="#custom-tabs-two-tabel-warning" role="tab" aria-controls="custom-tabs-two-tabel-warning" aria-selected="false">Tabel</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <!-- GRAFIK -->
                  <div class="tab-pane fade show active" id="custom-tabs-two-grafik-warning" role="tabpanel" aria-labelledby="custom-tabs-two-grafik-tab-warning">
                    <div id="container23"></div>
                  </div>
                  <!-- TABEL -->
                  <div class="tab-pane fade" id="custom-tabs-two-tabel-warning" role="tabpanel" aria-labelledby="custom-tabs-two-tabel-tab-warning">
                    <div class="card-body p-0">
                      <table class="table table-bordered" id="datatable1">
                        <thead>
                          <tr>
                            <th></th>
                            <th>BCG</th>
                            <th>Polio 1</th>
                            <th>DPT-HB-Hib 1</th>
                            <th>Polio 2</th>
                            <th>DPT-HB-Hib 2</th>
                            <th>Polio 3</th>
                            <th>DPT-HB-Hib 3</th>
                            <th>Polio 4</th>
                            <th>Campak</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $imunisasi_tahun = mysqli_query($conn, "SELECT * FROM tb_imunisasi GROUP BY YEAR(tanggal_imunisasi) ");
                              foreach($imunisasi_tahun as $dta_imunisasi_tahun) {
                            ?>
                            <?php
                              if ($dta_imunisasi_tahun['tanggal_imunisasi'] != "-"){
                            ?>
                          <tr>
                            <?php
                              $tahun_ini = substr($dta_imunisasi_tahun['tanggal_imunisasi'],0,4);
                            ?>
                            <th><?=  $tahun_ini ?></th>
                            <?php
                              $imunisasi_array = array("BCG", "Polio 1", "DPT-HB-Hib 1", "Polio 2",
                                                      "DPT-HB-Hib 2", "Polio 3", "DPT-HB-Hib 3",
                                                      "Polio 4", "CAMPAK");
                              foreach ($imunisasi_array as $dta_imunisasi_array){
                                $result_imun = mysqli_query($conn,"SELECT * FROM tb_imunisasi WHERE nama_imunisasi = '$dta_imunisasi_array' AND
                                                                    jenis_kelamin_bayi_imunisasi = 'Perempuan' AND status_imunisasi = 'Sudah' AND year(tanggal_imunisasi) =  $tahun_ini ");
                                $row_imun = mysqli_num_rows($result_imun);
                                ?>
                                <td style="text-align:center"><?= $row_imun ?></td>
                                <?php
                              }
                            ?>
                          </tr>
                            <?php
                                }
                              }
                            ?>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /.row (main row) -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  


<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Sistem Informasi | UINAM</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.0.5 -->
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- bs-custom-file-input -->
<script src="../../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="../../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- ChartJS -->
<script src="../../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../../assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Summernote -->
<script src="../../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>
<!-- bootstrap-switch-button -->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../../assets/dist/js1/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../../assets/dist/js1/bootstrap.min.js"></script>
	<script src="../../assets/dist/js1/highcharts.js"></script>
	<script src="../../assets/dist/js1/exporting.js"></script>

<?php
 $data_tahun_grafik = array();
  $imunisasi_tahun_grafik = mysqli_query($conn, "SELECT * FROM tb_imunisasi GROUP BY YEAR(tanggal_imunisasi) ");
  foreach($imunisasi_tahun as $dta_imunisasi_tahun) {
    if ($dta_imunisasi_tahun['tanggal_imunisasi'] != "-"){
      $data_tahun_grafik[] = array(substr($dta_imunisasi_tahun['tanggal_imunisasi'],0,4));
    }
  }
?>
<!-- page script -->
<script>
   var tahun_imunisasi = <?php echo json_encode($data_tahun_grafik) ?>;
	var chart12; // globally available
  var chart13;
  $(function () {

    chart12 = new Highcharts.Chart({
	         chart: {
             renderTo: 'container22',
	            type: 'column'
	         },
	         title: {
	            text: 'Grafik Tahun Imunisasi Jenis Kelamin Laki-laki'
	         },
	         xAxis: {
	            categories: tahun_imunisasi
	         },
	         yAxis: {
              allowDecimals: false,
	            title: {
	               text: 'Jumlah'
	            }
	         },
	         series: [
	            <?php
                $imunisasi_array_grafik = array("BCG", "Polio 1", "DPT-HB-Hib 1", "Polio 2",
                                          "DPT-HB-Hib 2", "Polio 3", "DPT-HB-Hib 3",
                                          "Polio 4", "CAMPAK");
                foreach ($imunisasi_array_grafik as $name_imunisasi_array_grafik){
                  $value_imun_grafik = array();
                  $tahun = 2019;
                  foreach ($data_tahun_grafik as $dta_data_tahun_grafik){
                      $result_imun_grafik = mysqli_query($conn,"SELECT * FROM tb_imunisasi WHERE nama_imunisasi = '$name_imunisasi_array_grafik' AND
                                                         jenis_kelamin_bayi_imunisasi = 'Laki - laki' AND status_imunisasi = 'Sudah' AND year(tanggal_imunisasi) =  $tahun ");
                      
                      $value_imun_grafik[] = array(mysqli_num_rows($result_imun_grafik));
                      $tahun++;
                  }
	            ?>
              {
              name: '<?php  echo $name_imunisasi_array_grafik ?>',
              data: <?php echo json_encode( $value_imun_grafik); ?>
            },
	                  // {	name: '',
	            <?php
                  //  $value_imun_grafik = array();
                } ?>
	         ],
            exporting: {
              enabled: false
            }
	  });


    chart13 = new Highcharts.Chart({
	         chart: {
             renderTo: 'container23',
	            type: 'column'
	         },
	         title: {
	            text: 'Grafik Tahun Imunisasi Jenis Kelamin Perempuan'
	         },
	         xAxis: {
	            categories: tahun_imunisasi
	         },
	         yAxis: {
              allowDecimals: false,
	            title: {
	               text: 'Jumlah'
	            }
	         },
	         series: [
	            <?php
                $imunisasi_array_grafik = array("BCG", "Polio 1", "DPT-HB-Hib 1", "Polio 2",
                                          "DPT-HB-Hib 2", "Polio 3", "DPT-HB-Hib 3",
                                          "Polio 4", "CAMPAK");
                foreach ($imunisasi_array_grafik as $name_imunisasi_array_grafik){
                  $value_imun_grafik = array();
                  $tahun = 2019;
                  foreach ($data_tahun_grafik as $dta_data_tahun_grafik){
                      $result_imun_grafik = mysqli_query($conn,"SELECT * FROM tb_imunisasi WHERE nama_imunisasi = '$name_imunisasi_array_grafik' AND
                                                         jenis_kelamin_bayi_imunisasi = 'Perempuan' AND status_imunisasi = 'Sudah' AND year(tanggal_imunisasi) =  $tahun ");
                      
                      $value_imun_grafik[] = array(mysqli_num_rows($result_imun_grafik));
                      $tahun++;
                  }
	            ?>
              {
              name: '<?php  echo $name_imunisasi_array_grafik ?>',
              data: <?php echo json_encode( $value_imun_grafik); ?>
            },
	                  // {	name: '',
	            <?php
                  //  $value_imun_grafik = array();
                } ?>
	         ],
            exporting: {
              enabled: false
            }
	  });



    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });


    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });


  })
</script>

<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });

  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>

</body>
</html>
