<?php
 require_once '../../koneksi.php';
 header('Content-type: application/json');

 $id_bayi = $_POST["id_bayi"];
 $foto_bayi = $_POST["foto_bayi"];
 $path = "/apmodasi/assets/dist/img/bayi/image_".time().".png";
 $finalPath = "image_".time().".png";

 $query = "UPDATE tb_bayi SET foto_bayi = '$finalPath' WHERE id_bayi = '$id_bayi'";

 if (mysqli_query($conn, $query)) {
     file_put_contents( $path, base64_decode($foto_bayi) );
}

//  $result = mysqli_query($conn, $query);
 $exeQuery =  mysqli_query($conn, $query);
 echo ($exeQuery) ? json_encode(array('kode' =>'1', 'pesan' => 'Berhasil Mengubah Data'
 )) : json_encode(array('kode' => '2', 'pesan' => 'Proses gagal'));
?>