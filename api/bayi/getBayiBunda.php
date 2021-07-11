<?php
 require_once '../../koneksi.php';
 header('Content-type: application/json');

 $bunda_id = $_GET["bunda_id"];
 $status_bayi = $_GET["status_bayi"];
 if ($status_bayi == "Semua"){
   $query = "SELECT * FROM tb_bayi WHERE bunda_id = '$bunda_id'";
 } else{
   $query = "SELECT * FROM tb_bayi WHERE bunda_id = '$bunda_id' AND status_bayi = '$status_bayi' ";
 }


 $result = mysqli_query($conn, $query);

 $array = array();
 while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
 }

 echo ($result) ?
 json_encode(array("kode" => "1", "bayi_data" => $array)) :
 json_encode(array("kode" => "0", "pesan" => "Data tidak ditemukan"));
?>