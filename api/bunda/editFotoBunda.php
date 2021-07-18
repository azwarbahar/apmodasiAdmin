<?php
 require_once '../../koneksi.php';
 header('Content-type: application/json');

 $id_bunda = $_POST["id_bunda"];
 $foto_bunda = $_POST["foto_bunda"];
 $path = "/apmodasi/assets/dist/img/bunda/foto/image_".time().".png";
 $finalPath = "image_".time().".png";

 $query = "UPDATE tb_bunda SET foto_bunda = '$finalPath' WHERE id_bunda = '$id_bunda'";

 if (mysqli_query($conn, $query)) {
     file_put_contents( $path, base64_decode($foto_bunda) );
}

//  $result = mysqli_query($conn, $query);
 $exeQuery =  mysqli_query($conn, $query);
 echo ($exeQuery) ? json_encode(array("kode" =>"1", "pesan" => "Berhasil Mengubah Data"
 )) : json_encode(array("kode" => "2", "pesan" => "Proses gagal"));
?>