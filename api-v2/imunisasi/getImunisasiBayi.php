<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

$bayi_id = $_GET["bayi_id"];
$query = "SELECT * FROM tb_imunisasi WHERE bayi_id = '$bayi_id' AND nama_imunisasi != 'IPV' ";
$result = mysqli_query($conn, $query);

 $array = array();
 while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
 }

 echo ($result) ?
 json_encode(array("kode" => "1", "imunisasi_bayi" => $array)) :
 json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
?>