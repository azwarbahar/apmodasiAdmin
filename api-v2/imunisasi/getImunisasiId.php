<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

$id_imunisasi = $_GET["id_imunisasi"];
$query = "SELECT * FROM tb_imunisasi WHERE id_imunisasi = '$id_imunisasi'";

 $result = mysqli_query($conn, $query);

//  $array = array();
while($row = mysqli_fetch_assoc($result)){
    $array = $row;
}

 echo ($result) ?
 json_encode(array("kode" => 1, "result_imunisasi" => $array)) :
 json_encode(array("kode" => 0, "pesan" => "Data tidak ditemukan"));
?>