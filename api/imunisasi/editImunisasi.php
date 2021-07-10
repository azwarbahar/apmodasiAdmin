<?php
 require_once '../../koneksi.php';
 header('Content-type: application/json');

 $bayi_id = $_POST["bayi_id"];
 $no_imunisasi = $_POST["no_imunisasi"];
 $usia_bayi_imunisasi = $_POST["usia_bayi_imunisasi"];
 $kader_id = $_POST["kader_id"];
 $status_imunisasi = $_POST["status_imunisasi"];
 $catatan_imunisasi = $_POST["catatan_imunisasi"];
 $tanggal_imunisasi = $_POST["tanggal_imunisasi"];

 $query = "UPDATE tb_imunisasi SET usia_bayi_imunisasi = '$usia_bayi_imunisasi',
                                    kader_id = '$kader_id',
                                    status_imunisasi = '$status_imunisasi',
                                    catatan_imunisasi = '$catatan_imunisasi',
                                    tanggal_imunisasi = '$tanggal_imunisasi',
							        update_at = null WHERE bayi_id = '$bayi_id' AND no_imunisasi = '$no_imunisasi'";

//  $result = mysqli_query($conn, $query);
 $exeQuery =  mysqli_query($conn, $query);
 echo ($exeQuery) ? json_encode(array('kode' =>'1', 'pesan' => 'Berhasil Mengubah Data'
 )) : json_encode(array('kode' => '2', 'pesan' => 'Proses gagal'));
?>