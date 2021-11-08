<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');

 $id_kader = $_POST["id_kader"];
 $nama_kader = $_POST["nama_kader"];
 $kontak_kader = $_POST["kontak_kader"];
 $alamat_kader = $_POST["alamat_kader"];
 $username_kader = $kontak_kader;

 $query = "UPDATE tb_kader SET nama_kader = '$nama_kader',
                                    kontak_kader = '$kontak_kader',
							        alamat_kader = '$alamat_kader',
                                    update_at = null WHERE nip_kader = '$id_kader'";
$query2 = "UPDATE tb_auth SET username = '$username_kader',
                                update_at = null WHERE user_kode = '$id_kader' AND role = 'Kader' ";
if (mysqli_query($conn, $query)) {
    echo json_encode(array('kode' =>'1', 'pesan' => 'Berhasil Mengubah Data'));
    mysqli_query($conn, $query2);
} else {
    echo json_encode(array('kode' => '2', 'pesan' => 'Proses gagal'));
}
?>