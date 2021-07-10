<?php
 require_once '../../koneksi.php';

    $bayi_id = $_POST['bayi_id'];
    $nilai_tb = $_POST['nilai_tb'];
    $catatan_tb = $_POST['catatan_tb'];
    $kader_id = $_POST['kader_id'];
    $tanggal_tb = $_POST['tanggal_tb'];

    $query = "INSERT INTO tb_tinggi_badan values(null,'$bayi_id',
                                            '$nilai_tb',
                                            '$catatan_tb',
                                            '$kader_id',
                                            '$tanggal_tb',
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