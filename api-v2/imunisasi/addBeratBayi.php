<?php
 require_once '../../koneksi-v2.php';

    $bayi_id = $_POST['bayi_id'];
    $nilai_bb = $_POST['nilai_bb'];
    $catatan_bb = $_POST['catatan_bb'];
    $kader_id = $_POST['kader_id'];
    $tanggal_bb = $_POST['tanggal_bb'];
    $usia_bayi = "-";
    $jenis_input = "Berat";

    $query = "INSERT INTO tb_berat_badan values(null,'$bayi_id',
                                            '$nilai_bb',
                                            '$catatan_bb',
                                            '$kader_id',
                                            '$tanggal_bb',
                                            null,
                                            null)";

    $query2 = "INSERT INTO tb_riwayat_kader values(null,'$kader_id',
                                            '$bayi_id',
                                            '$usia_bayi',
                                            '$jenis_input',
                                            '$nilai_bb',
                                            '$catatan_bb',
                                            '$tanggal_bb',
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