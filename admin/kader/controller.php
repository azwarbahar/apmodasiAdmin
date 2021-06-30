<?php
function plugins() { ?>
	<link rel="stylesheet" href="/apmodasi/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/apmodasi/assets/dist/css2/components.css">
	<script src="/apmodasi/assets/dist/jquery.min.js"></script>
	<script src="/apmodasi/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');


// SUBMIT kader
if (isset($_POST['submit_kader'])) {
	$nip_kader = $_POST['nip_kader'];
	$nama_kader = $_POST['nama_kader'];
	$jenis_kelamin_kader = $_POST['jenis_kelamin_kader'];
	$kontak_kader = $_POST['kontak_kader'];
	$alamat_kader = $_POST['alamat_kader'];
	$username_kader = $_POST['nip_kader'];
	$password_kader = $_POST['nip_kader'];
	$passwordHash = password_hash($password_kader, PASSWORD_DEFAULT);
	$status_kader = "Active";
	$role = "Kader";

	// SET FOTO
	$foto = $_FILES['foto_kader']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$nama_foto = "image_".time().".".$ext;
    $file_tmp = $_FILES['foto_kader']['tmp_name'];

    // TAMBAH DATA
	$query= "INSERT INTO tb_kader VALUES (NULL, '$nip_kader', '$nama_kader', '$jenis_kelamin_kader', '$kontak_kader', '$alamat_kader', '$nama_foto', '$status_kader', null, null)";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		//get Id kader
		$getIdInster = mysqli_insert_id($conn);
		// TAMBAH AKUN LOGIN KADER
		$queryauth = "INSERT INTO tb_auth VALUES (NULL, '$getIdInster', '$username_kader', '$passwordHash', '$status_kader', '$role', null, null)";
		mysqli_query($conn, $queryauth);
        move_uploaded_file($file_tmp, '../../assets/dist/img/kader/'.$nama_foto);
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data kader Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE kader
if (isset($_POST['edit_kader'])) {
	$id_kader = $_POST['id_kader'];
	$nip_kader = $_POST['nip_kader'];
	$nama_kader = $_POST['nama_kader'];
	$jenis_kelamin_kader = $_POST['jenis_kelamin_kader'];
	$kontak_kader = $_POST['kontak_kader'];
	$alamat_kader = $_POST['alamat_kader'];
	$status_kader = $_POST['status_kader'];
	$username_kader = $_POST['nip_kader'];

    // SET FOTO
	if ($_FILES['foto_kader']['name'] != '') {
		$foto = $_FILES['foto_kader']['name'];
		$ext = pathinfo($foto, PATHINFO_EXTENSION);
		$nama_foto = "image_".time().".".$ext;
		$file_tmp = $_FILES['foto_kader']['tmp_name'];
		// HAPUS OLD FOTO
		$target = "../../assets/dist/img/kader/".$_POST['foto_now'];
		if (file_exists($target) && $_POST['foto_now'] != 'foto_default.png') unlink($target);
		// UPLOAD NEW FOTO
		move_uploaded_file($file_tmp, '../../assets/dist/img/kader/'.$nama_foto);
	} else {
		$nama_foto = $_POST['foto_now'];
	}
    $query = "UPDATE tb_kader SET nip_kader = '$nip_kader',
                                  nama_kader = '$nama_kader',
                                  jenis_kelamin_kader = '$jenis_kelamin_kader',
                                  kontak_kader = '$kontak_kader',
                                  alamat_kader = '$alamat_kader',
                                  foto_kader = '$nama_foto',
                                  status_kader = '$status_kader',
                                  update_at = null WHERE id_kader = '$id_kader'";
		mysqli_query($conn, $query);
	// EDIT PARTAI
	if (mysqli_affected_rows($conn) > 0) {
		$query2 = "UPDATE tb_auth SET username = '$username_kader',
									  status = '$status_kader',
									  update_at = null WHERE user_id = '$id_kader' AND role = 'Kader' ";
		mysqli_query($conn, $query2);
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data kader berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS AREA
if (isset($_GET['hapus_kader'])) {
	$id_kader = $_GET['id_kader'];

	$query = "DELETE FROM tb_kader WHERE id_kader = '$id_kader'";
	$query2 = "DELETE FROM tb_auth WHERE user_id = '$id_kader' AND role = 'Kader' ";
	mysqli_query($conn, $query);
	mysqli_query($conn, $query2);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data kader berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}



?>