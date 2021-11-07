<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

$nomor_bayi = $_GET["nomor_bayi"];
$query = "SELECT * FROM tb_bayi WHERE nomor_bayi = '$nomor_bayi'";

 $result = mysqli_query($conn, $query);

//  $array = array();
while($row = mysqli_fetch_assoc($result)){
    $array = $row;
}

 echo ($result) ?
 json_encode(array("kode" => "1", "result_bayi" => $array)) :
 json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
?>