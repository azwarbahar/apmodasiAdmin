<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

$query = "SELECT * FROM tb_bunda ORDER BY id_bunda DESC";

 $result = mysqli_query($conn, $query);

 $array = array();
 while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
 }

 echo ($result) ?
 json_encode(array("kode" => "1", "bunda_data" => $array)) :
 json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
?>