<?php
require('koneksi-v2.php');

$bayi = mysqli_query($conn, "SELECT * FROM tb_bayi");
foreach($bayi as $dta){

    $jenis_kelamin_bayi = $dta['jenis_kelamin_bayi'];

    if ($jenis_kelamin_bayi == "Perempuan"){

        $query = "UPDATE tb_imunisasi SET jenis_kelamin_bayi_imunisasi = 'Perempuan',
                            update_at = null WHERE bayi_id = '$dta[id_bayi]'";
        mysqli_query($conn, $query);
    } else {
        $query = "UPDATE tb_imunisasi SET jenis_kelamin_bayi_imunisasi = 'Laki - laki',
                            update_at = null WHERE bayi_id = '$dta[id_bayi]'";
        mysqli_query($conn, $query);
    }

}


?>