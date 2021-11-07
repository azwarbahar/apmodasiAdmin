<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

 $id_kader = $_POST["id_kader"];
 $foto_kader = $_POST["foto_kader"];
 $path = "../../assets/dist/img/kader/image_".time().".png";
 $finalPath = "image_".time().".png";

 $query = "UPDATE tb_kader SET foto_kader = '$finalPath',
                                update_at = null WHERE id_kader = '$id_kader'";

 if (mysqli_query($conn, $query)) {
     file_put_contents( $path, base64_decode($foto_kader) );
     echo json_encode(array('kode' =>'1', 'pesan' => 'Berhasil Mengubah Data'));
}
 else {
    echo json_encode(array("kode" => "0", "pesan" => "Proses gagal"));
}

// echo ($mysqli_query($conn, $query)) ?
// json_encode(array("kode" => "1", "pesan" => "Berhasil Mengubah Data")) :
// json_encode(array("kode" => "0", "pesan" => "Proses gagal"));
//  $result = mysqli_query($conn, $query);
//  $exeQuery =  mysqli_query($conn, $query);
//  echo ($exeQuery) ? json_encode(array('kode' =>'1', 'pesan' => 'Berhasil Mengubah Data'
//  )) : json_encode(array('kode' => '2', 'pesan' => 'Proses gagal'));
?>