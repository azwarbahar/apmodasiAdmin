<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

$kader_id = $_GET["kader_id"];
$query = "SELECT * FROM tb_riwayat_kader WHERE nip_kader = '$kader_id' ORDER BY id_riwayat_kader DESC ";

 $result = mysqli_query($conn, $query);

 $array = array();
 while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
 }

 echo ($result) ?
 json_encode(array("kode" => "1", "riwayat_kader" => $array)) :
 json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
?>