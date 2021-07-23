<?php
 require_once '../../koneksi.php';
 header('Content-type: application/json');

 $id_kader = $_POST["id_kader"];
 $nama_kader = $_POST["nama_kader"];
 $kontak_kader = $_POST["kontak_kader"];
 $alamat_kader = $_POST["alamat_kader"];

 $query = "UPDATE tb_kader SET nama_kader = '$nama_kader',
                                    kontak_kader = '$kontak_kader',
							        alamat_kader = '$alamat_kader',
                                    update_at = null WHERE id_kader = '$id_kader'";
//  $result = mysqli_query($conn, $query);
 $exeQuery =  mysqli_query($conn, $query);
 echo ($exeQuery) ? json_encode(array('kode' =>'1', 'pesan' => 'Berhasil Mengubah Data'
 )) : json_encode(array('kode' => '2', 'pesan' => 'Proses gagal'));
?>