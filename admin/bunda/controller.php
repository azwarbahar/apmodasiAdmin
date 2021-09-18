<?php
function plugins() { ?>
	<link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/dist/css2/components.css">
	<script src="../../assets/dist/jquery.min.js"></script>
	<script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');


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

if (isset($_GET['konfirmasi_bunda'])){
	$id_auth = $_GET['id_auth'];
	
    $query = "UPDATE tb_auth SET status = 'Active',
                                  update_at = null WHERE id_auth = '$id_auth'";
		mysqli_query($conn, $query);
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Akun berhasil dikonfirmasi',
					icon: 'success'
				}).then((data) => {
					location.href = 'data-terbaru.php';
				});
			});
		</script>
	<?php
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