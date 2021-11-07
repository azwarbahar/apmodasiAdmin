<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

 $id_bayi = $_POST["id_bayi"];
 $nama_bayi = $_POST["nama_bayi"];
 $tanggal_lahir_bayi = $_POST["tanggal_lahir_bayi"];
 $tahun = substr($tanggal_lahir_bayi,0,4);
 $jenis_kelamin_bayi = $_POST["jenis_kelamin_bayi"];

 $query = "UPDATE tb_bayi SET nama_bayi = '$nama_bayi',
                                    tanggal_lahir_bayi = '$tanggal_lahir_bayi',
                                    tahun_bayi = '$tahun',
							        jenis_kelamin_bayi = '$jenis_kelamin_bayi',
                                    update_at = null WHERE id_bayi = '$id_bayi'";
//  $result = mysqli_query($conn, $query);
 $exeQuery =  mysqli_query($conn, $query);
 echo ($exeQuery) ? json_encode(array('kode' =>'1', 'pesan' => 'Berhasil Mengubah Data'
 )) : json_encode(array('kode' => '2', 'pesan' => 'Proses gagal'));
?>