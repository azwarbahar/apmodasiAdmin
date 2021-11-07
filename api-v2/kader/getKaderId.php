<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

$id_kader = $_GET["id_kader"];
$query = "SELECT * FROM tb_kader WHERE id_kader = '$id_kader'";

 $result = mysqli_query($conn, $query);

//  $array = array();
while($row = mysqli_fetch_assoc($result)){
    $array = $row;
}

 echo ($result) ?
 json_encode(array("kode" => 1, "result_kader" => $array)) :
 json_encode(array("kode" => 0, "pesan" => "Data tidak ditemukan"));
?>