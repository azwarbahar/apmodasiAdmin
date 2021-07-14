<?php

if (isset($_POST['cari_tahun'])) {
    $tahun = $_POST['tahun_select'];
    header('Location:data.php?tahun='.$tahun);
}

?>