<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

$id_bunda = $_GET["id_bunda"];
$query = "SELECT * FROM tb_bunda WHERE nik_bunda = '$id_bunda'";

 $result = mysqli_query($conn, $query);

//  $array = array();
while($row = mysqli_fetch_assoc($result)){
    $array = $row;
}

 echo ($result) ?
 json_encode(array("kode" => "1", "result_bunda" => $array)) :
 json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
?>