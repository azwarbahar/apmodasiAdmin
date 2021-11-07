<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

 $id_kader = $_GET["id_kader"];
 $password_lama = $_GET["password_lama"];
 $password_baru = $_GET["password_baru"];

$getkader = mysqli_query($conn, "SELECT * FROM tb_auth WHERE user_id = '$id_kader' AND role = 'Kader' ");
$data = mysqli_fetch_assoc($getkader);

if (password_verify($password_lama, $data["password"])) {
	$password = password_hash($password_baru, PASSWORD_DEFAULT);
    $query =  mysqli_query($conn, "UPDATE tb_auth SET password = '$password' WHERE user_id = '$id_kader' AND role = 'Kader' ");
    if ($query){
        echo json_encode(array("kode" => "1", "pesan" => "Berhasil Mengubah Password"));
    } else {
        echo json_encode(array("kode" => "2", "pesan" => "Terjadi Kesalahan Saat Mengubah Password"));
    }
} else{
    echo json_encode(array("kode" => "0", "pesan" => "Password lama tidak sesuai"));
}
?>