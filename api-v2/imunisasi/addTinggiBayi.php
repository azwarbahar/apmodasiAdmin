<?php
 require_once '../../koneksi-v2.php';

    $bayi_id = $_POST['bayi_id'];
    $nilai_tb = $_POST['nilai_tb'];
    $catatan_tb = $_POST['catatan_tb'];
    $kader_id = $_POST['kader_id'];
    $tanggal_tb = $_POST['tanggal_tb'];
    $usia_bayi = "-";
    $jenis_input = "Tinggi";

    $query = "INSERT INTO tb_tinggi_badan values(null,'$bayi_id',
                                            '$nilai_tb',
                                            '$catatan_tb',
                                            '$kader_id',
                                            '$tanggal_tb',
                                            null,
                                            null)";

$query2 = "INSERT INTO tb_riwayat_kader values(null,'$kader_id',
                                        '$bayi_id',
                                        '$usia_bayi',
                                        '$jenis_input',
                                        '$nilai_tb',
                                        '$catatan_tb',
                                        '$tanggal_tb',
                                        null,
                                        null)";

        if ( mysqli_query($conn, $query) ){
                mysqli_query($conn, $query2);
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