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




// SUBMIT bunda
if (isset($_POST['submit_bunda'])) {
	$nama_bunda = $_POST['nama_bunda'];
	$kontak_bunda = $_POST['kontak_bunda'];
	$alamat_bunda = $_POST['alamat_bunda'];
	$username_bunda = $_POST['username_bunda'];
	$password_bunda = $_POST['username_bunda'];
	$passwordHash = password_hash($password_bunda, PASSWORD_DEFAULT);
	$status_bunda = "Active";
	$role = "Bunda";

	// SET FOTO
	$foto = $_FILES['foto_bunda']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$nama_foto = "image_".time().".".$ext;
    $file_tmp = $_FILES['foto_bunda']['tmp_name'];

    // TAMBAH DATA
	$query= "INSERT INTO tb_bunda VALUES (NULL, '$nama_bunda', '$kontak_bunda', '$alamat_bunda', '$nama_foto', null, null)";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		//get Id bunda
		$getIdInster = mysqli_insert_id($conn);
		// TAMBAH AKUN LOGIN bunda
		$queryauth = "INSERT INTO tb_auth VALUES (NULL, '$getIdInster', '$username_bunda', '$passwordHash', '$status_bunda', '$role', null, null)";
		mysqli_query($conn, $queryauth);
        move_uploaded_file($file_tmp, '../../assets/dist/img/bunda/'.$nama_foto);
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Bunda Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE bunda
if (isset($_POST['edit_bunda'])) {
	$id_bunda = $_POST['id_bunda'];
	$nama_bunda = $_POST['nama_bunda'];
	$kontak_bunda = $_POST['kontak_bunda'];
	$alamat_bunda = $_POST['alamat_bunda'];
	$status_bunda = $_POST['status_bunda'];
	$username_bunda = $_POST['username_bunda'];

    // SET FOTO
	if ($_FILES['foto_bunda']['name'] != '') {
		$foto = $_FILES['foto_bunda']['name'];
		$ext = pathinfo($foto, PATHINFO_EXTENSION);
		$nama_foto = "image_".time().".".$ext;
		$file_tmp = $_FILES['foto_bunda']['tmp_name'];
		// HAPUS OLD FOTO
		$target = "../../assets/dist/img/bunda/".$_POST['foto_now'];
		if (file_exists($target) && $_POST['foto_now'] != 'foto_default.png') unlink($target);
		// UPLOAD NEW FOTO
		move_uploaded_file($file_tmp, '../../assets/dist/img/bunda/'.$nama_foto);
	} else {
		$nama_foto = $_POST['foto_now'];
	}
    $query = "UPDATE tb_bunda SET nama_bunda = '$nama_bunda',
                                  kontak_bunda = '$kontak_bunda',
                                  alamat_bunda = '$alamat_bunda',
                                  foto_bunda = '$nama_foto',
                                  update_at = null WHERE id_bunda = '$id_bunda'";
		mysqli_query($conn, $query);
	// EDIT PARTAI
	if (mysqli_affected_rows($conn) > 0) {
		$query2 = "UPDATE tb_auth SET username = '$username_bunda',
									  status = '$status_bunda',
									  update_at = null WHERE user_id = '$id_bunda' AND role = 'Bunda' ";
		mysqli_query($conn, $query2);
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Bunda berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS AREA
if (isset($_GET['hapus_bunda'])) {
	$id_bunda = $_GET['id_bunda'];

	$query = "DELETE FROM tb_bunda WHERE id_bunda = '$id_bunda'";
	$query2 = "DELETE FROM tb_auth WHERE user_id = '$id_bunda' AND role = 'Bunda' ";
	mysqli_query($conn, $query);
	mysqli_query($conn, $query2);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Bunda berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}



?>