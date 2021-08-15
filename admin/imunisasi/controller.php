<?php
function plugins() { ?>
	<link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/dist/css2/components.css">
	<script src="../../assets/dist/jquery.min.js"></script>
	<script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');


// SUBMIT ADMIN
if (isset($_POST['submit_imunisasi'])) {
	$id_bayi = $_POST['id_bayi'];
    $imunisasi = mysqli_query($conn, "SELECT * FROM tb_imunisasi WHERE bayi_id = '$id_bayi'");
    foreach($imunisasi as $dta_imunisasi) {
        $no_imunisasi = $dta_imunisasi['no_imunisasi'];
        $usia_bayi_imunisasi = $_POST['usia'.$no_imunisasi];
        $kader_id = $_POST['kader'.$no_imunisasi];
        $status_imunisasi = "Sudah";
        $catatan_imunisasi = $_POST['keterangan'.$no_imunisasi];
        $tanggal_imunisasi = $_POST['tanggal'.$no_imunisasi];
        $jenis_input = "Vaksin";

        if (!$catatan_imunisasi == ""){
            $query = "UPDATE tb_imunisasi SET usia_bayi_imunisasi = '$usia_bayi_imunisasi',
                                                kader_id = '$kader_id',
                                                status_imunisasi = '$status_imunisasi',
                                                catatan_imunisasi = '$catatan_imunisasi',
                                                tanggal_imunisasi = '$tanggal_imunisasi',
                                                update_at = null WHERE bayi_id = '$id_bayi' AND no_imunisasi = '$no_imunisasi'";
    
    
            $query2 = "INSERT INTO tb_riwayat_kader values(null,'$kader_id',
                                                    '$id_bayi',
                                                    '$usia_bayi_imunisasi',
                                                    '$no_imunisasi',
                                                    '$status_imunisasi',
                                                    '$catatan_imunisasi',
                                                    '$tanggal_imunisasi',
                                                    null,
                                                    null)";
             mysqli_query($conn, $query);
             mysqli_query($conn, $query2);
        }
    }
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Berhasil ditambah data!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php?tahun=All';
				});
			});
		</script>
	<?php }
}

?>