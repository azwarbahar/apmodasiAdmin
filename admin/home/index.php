
<?php

// require '../template/header/header.php';
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




<!-- page script -->
<script>

	var chart11; // globally available
  $(function () {

    chart11 = new Highcharts.Chart({
	         chart: {
	            renderTo: 'container2',
	            type: 'column'
	         },
	         title: {
	            text: 'Grafik Perangkingan '
	         },
	         xAxis: {
	            categories: ['Mahasiswa']
	         },
	         yAxis: {
	            title: {
	               text: 'Nilai'
	            }
	         },
	              series:
	            [
	            <?php
              $kelurahan_array = array("Balang Baru", "Barombong", "Bongaya",
                                       "Bonto Duri", "Jongaya", "Maccini Sombala", "Mangasa",
                                       "Mannuruki", "Pabaeng-Baeng", "Parang Tambung", "Tanjung Merdeka");
              foreach ($kelurahan_array as $dta_kelurahan_array){
                $result= mysqli_query($conn,"SELECT SUM(berat_sampah) AS total_berat FROM tb_laporan_petugas WHERE kelurahan = '$dta_kelurahan_array' ");
                $row = mysqli_fetch_assoc($result)
	                  ?>
	                 //data yang diambil dari database dimasukan ke variable nama dan data
	                 //
	                  {	name: '<?php echo $dta_kelurahan_array ?>',
	                    data: [<?php echo $row['total_berat'] ?>]
	                  },
	                  <?php } ?>
	            ]
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
