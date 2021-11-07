<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

 $id_bayi = $_POST["id_bayi"];
 $foto_bayi = $_POST["foto_bayi"];
 $path = "../../assets/dist/img/bayi/image_".time().".png";
 $finalPath = "image_".time().".png";

 $query = "UPDATE tb_bayi SET foto_bayi = '$finalPath',
                                update_at = null WHERE id_bayi = '$id_bayi'";

 if (mysqli_query($conn, $query)) {
    file_put_contents( $path, base64_decode($foto_bayi) );
    echo json_encode(array('kode' =>'1', 'pesan' => 'Berhasil Mengubah Data'));
}
else {
   echo json_encode(array("kode" => "0", "pesan" => "Proses gagal"));
}
?>