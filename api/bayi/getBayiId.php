<?php
 require_once '../../koneksi.php';
 header('Content-type: application/json');

$id_bayi = $_GET["id_bayi"];
$query = "SELECT * FROM tb_bayi WHERE id_bayi = '$id_bayi'";

 $result = mysqli_query($conn, $query);

//  $array = array();
while($row = mysqli_fetch_assoc($result)){
    $array = $row;
}

 echo ($result) ?
 json_encode(array("kode" => 1, "result_bayi" => $array)) :
 json_encode(array("kode" => 0, "pesan" => "Data tidak ditemukan"));
?>