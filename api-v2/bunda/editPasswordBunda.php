<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

 $id_bunda = $_GET["id_bunda"];
 $password_lama = $_GET["password_lama"];
 $password_baru = $_GET["password_baru"];

$getbunda = mysqli_query($conn, "SELECT * FROM tb_auth WHERE user_id = '$id_bunda' AND role = 'Bunda' ");
$data = mysqli_fetch_assoc($getbunda);

if (password_verify($password_lama, $data["password"])) {
	$password = password_hash($password_baru, PASSWORD_DEFAULT);
    $query =  mysqli_query($conn, "UPDATE tb_auth SET password = '$password' WHERE user_id = '$id_bunda' AND role = 'Bunda' ");
    if ($query){
        echo json_encode(array("kode" => "1", "pesan" => "Berhasil Mengubah Password"));
    } else {
        echo json_encode(array("kode" => "2", "pesan" => "Terjadi Kesalahan Saat Mengubah Password"));
    }
} else{
    echo json_encode(array("kode" => "0", "pesan" => "Password lama tidak sesuai"));
}
?>