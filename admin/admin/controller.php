<?php
function plugins() { ?>
	<link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/dist/css2/components.css">
	<script src="../../assets/dist/jquery.min.js"></script>
	<script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi-v2.php');


// SUBMIT ADMIN
if (isset($_POST['submit_admin'])) {
	$nama_admin = $_POST['nama_admin'];
	$email_admin = $_POST['email_admin'];
	$username_admin = $_POST['username_admin'];
	$password_admin = $_POST['password_admin'];
	$passwordHash = password_hash($password_admin, PASSWORD_DEFAULT);
	$status_admin = "Active";

	// SET FOTO
	$foto = $_FILES['foto_admin']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$nama_foto = "image_".time().".".$ext;
    $file_tmp = $_FILES['foto_admin']['tmp_name'];

    // TAMBAH DATA
	$query= "INSERT INTO tb_admin VALUES (NULL, '$nama_admin', '$nama_foto', '$username_admin', '$passwordHash', '$email_admin', '$status_admin', null, null)";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
        move_uploaded_file($file_tmp, '../../assets/dist/img/admin/'.$nama_foto);
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Admin Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE ADMIN
if (isset($_POST['edit_admin'])) {
	$id_admin = $_POST['id_admin'];
	$nama_admin = $_POST['nama_admin'];
	$email_admin = $_POST['email_admin'];
	$username_admin = $_POST['username_admin'];
	$status_admin = $_POST['status_admin'];

    // SET FOTO
	if ($_FILES['foto_admin']['name'] != '') {
		$foto = $_FILES['foto_admin']['name'];
		$ext = pathinfo($foto, PATHINFO_EXTENSION);
		$nama_foto = "image_".time().".".$ext;
		$file_tmp = $_FILES['foto_admin']['tmp_name'];
		// HAPUS OLD FOTO
		$target = "../../assets/dist/img/admin/".$_POST['foto_now'];
		if (file_exists($target) && $_POST['foto_now'] != 'foto_default.png') unlink($target);
		// UPLOAD NEW FOTO
		move_uploaded_file($file_tmp, '../../assets/dist/img/admin/'.$nama_foto);
	} else {
		$nama_foto = $_POST['foto_now'];
	}
    $query = "UPDATE tb_admin SET nama_admin = '$nama_admin',
                                  foto_admin = '$nama_foto',
                                  username_admin = '$username_admin',
                                  email_admin = '$email_admin',
                                  status_admin = '$status_admin',
                                  update_at = null WHERE id_admin = '$id_admin'";
		mysqli_query($conn, $query);
	// EDIT PARTAI
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Admin berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS AREA
if (isset($_GET['hapus_admin'])) {
	$id_admin = $_GET['id_admin'];

	$query = "DELETE FROM tb_admin WHERE id_admin = '$id_admin'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Admin berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}



?>