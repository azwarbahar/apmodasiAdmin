<?php
 require_once '../../koneksi.php';

    $nomor_bayi = $_POST['nomor_bayi'];
    $nama_bayi = $_POST['nama_bayi'];
    $tanggal_lahir_bayi = $_POST['tanggal_lahir_bayi'];
    $jenis_kelamin_bayi = $_POST['jenis_kelamin_bayi'];
    $gambar_qr_bayi = $_POST['gambar_qr_bayi'];
    $foto_bayi = $_POST['foto_bayi'];
    $status_bayi = $_POST['status_bayi'];
    $bunda_id = $_POST['bunda_id'];

    $query = "INSERT INTO tb_bayi values(null,'$nomor_bayi',
                                            '$nama_bayi',
                                            '$tanggal_lahir_bayi',
                                            '$jenis_kelamin_bayi',
                                            '$gambar_qr_bayi',
                                            '$foto_bayi',
                                            '$status_bayi',
                                            '$bunda_id',
                                            null,
                                            null)";

        if ( mysqli_query($conn, $query) ){
                $result["kode"] = "1";
                $result["pesan"] = "Success";
                echo json_encode($result);
                mysqli_close($conn);

        } else {
            $response["kode"] = "0";
            $response["pesan"] = "Error! ".mysqli_error($conn);
            echo json_encode($response);
            mysqli_close($conn);
        }

?>