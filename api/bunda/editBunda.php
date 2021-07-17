<?php
 require_once '../../koneksi.php';
 header('Content-type: application/json');

 $id_bunda = $_POST["id_bunda"];
 $nama_bunda = $_POST["nama_bunda"];
 $kontak_bunda = $_POST["kontak_bunda"];
 $alamat_bunda = $_POST["alamat_bunda"];

 $query = "UPDATE tb_bunda SET nama_bunda = '$nama_bunda',
                                    kontak_bunda = '$kontak_bunda',
							        alamat_bunda = '$alamat_bunda',
                                    update_at = null WHERE id_bunda = '$id_bunda'";
//  $result = mysqli_query($conn, $query);
 $exeQuery =  mysqli_query($conn, $query);
 echo ($exeQuery) ? json_encode(array('kode' =>'1', 'pesan' => 'Berhasil Mengubah Data'
 )) : json_encode(array('kode' => '2', 'pesan' => 'Proses gagal'));
?>