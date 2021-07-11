<?php
 require_once '../../koneksi.php';
 header('Content-type: application/json');

$query = "SELECT * FROM tb_bayi WHERE status_bayi = 'Active' ORDER BY id_bayi DESC";

 $result = mysqli_query($conn, $query);

 $array = array();
 while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
 }

 echo ($result) ?
 json_encode(array("kode" => "1", "bayi" => $array)) :
 json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
?>