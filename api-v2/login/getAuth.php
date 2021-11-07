<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

$user_id = $_GET["user_id"];
$role = $_GET["role"];
$query = "SELECT * FROM tb_auth WHERE user_kode = '$user_id' AND role = '$role' ";

 $result = mysqli_query($conn, $query);

//  $array = array();
while($row = mysqli_fetch_assoc($result)){
    $array = $row;
}

 echo ($result) ?
 json_encode(array("kode" => "1", "auth_result" => $array)) :
 json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
?>