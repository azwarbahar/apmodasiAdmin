<?php
function plugins() { ?>
	<link rel="stylesheet" href="/apmodasi/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/apmodasi/assets/dist/css2/components.css">
	<script src="/apmodasi/assets/dist/jquery.min.js"></script>
	<script src="/apmodasi/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');


// AKTIF BAYI
if (isset($_GET['aktif_bayi'])) {
	$id_bayi = $_GET['id_bayi'];
	$no_imunisasi = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11");
	$nama_imunisasi = array("HB", "BCG", "Polio 1", "DPT-HB-Hib 1", "Polio 2", "DPT-HB-Hib 2", "Polio 3", "DPT-HB-Hib 3", "Polio 4", "IPV", "CAMPAK");
	$keterangan_imunisasi = array("Opsional", "Wajib", "Wajib", "Wajib", "Wajib", "Wajib", "Wajib", "Wajib", "Wajib", "Wajib", "Wajib");
	$interval_imunisasi = array("0 - 7 Hari", "0 - 11 Bulan", "0 - 11 Bulan", "2 - 11 Bulan", "2 - 11 Bulan", "3 - 11 Bulan", "3 - 11 Bulan", "4 - 11 Bulan", "4 - 11 Bulan", "4 - 11 Bulan", "9 - 11 Bulan", );

	$usia_bayi_imunisasi = "-";
	$kader_id = "-";
	$status_imunisasi = "Belum";
	$catatan_imunisasi = "-";
	$tanggal_imunisasi = "-";

	$x = 0;
	while($x < count($no_imunisasi)) {
		// TAMBAH DATA
		$query= "INSERT INTO tb_imunisasi VALUES (NULL, '$id_bayi',
												'$no_imunisasi[$x]',
												'$nama_imunisasi[$x]',
												'$usia_bayi_imunisasi',
												'$kader_id',
												'$status_imunisasi',
												'$catatan_imunisasi',
												'$keterangan_imunisasi[$x]',
												'$interval_imunisasi[$x]',
												'$tanggal_imunisasi',
												null,
												null)";
		mysqli_query($conn, $query);
	  $x++;
	}

	// EDIT BAYI
	if (mysqli_affected_rows($conn) > 0) {
		$query2 = "UPDATE tb_bayi SET status_bayi = 'Active',
									  update_at = null WHERE id_bayi = '$id_bayi'";
		mysqli_query($conn, $query2);
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Bayi berhasil diaktifkan',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}



// NONAKTIF BAYI
if (isset($_GET['nonaktif_bayi'])) {
	$id_bayi = $_GET['id_bayi'];

	$query = "UPDATE tb_bayi SET status_bayi = 'Menunggu',
									update_at = null WHERE id_bayi = '$id_bayi'";
	mysqli_query($conn, $query);
	// EDIT BAYI
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Bayi berhasil dinonaktifkan',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS BAYI
if (isset($_GET['hapus_bayi'])) {
	$id_bayi = $_GET['id_bayi'];

	$query = "DELETE FROM tb_bayi WHERE id_bayi = '$id_bayi'";
	$query2 = "DELETE FROM tb_imunisasi WHERE bayi_id = '$id_bayi' ";
	mysqli_query($conn, $query);
	mysqli_query($conn, $query2);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Bayi berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}



?>