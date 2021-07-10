<?php
 require_once '../../koneksi.php';

    $bayi_id = $_POST['bayi_id'];
    $nilai_bb = $_POST['nilai_bb'];
    $catatan_bb = $_POST['catatan_bb'];
    $kader_id = $_POST['kader_id'];
    $tanggal_bb = $_POST['tanggal_bb'];

    $query = "INSERT INTO tb_berat_badan values(null,'$bayi_id',
                                            '$nilai_bb',
                                            '$catatan_bb',
                                            '$kader_id',
                                            '$tanggal_bb',
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