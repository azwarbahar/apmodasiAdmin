<?php
require_once '../../koneksi.php';
header('Content-type: application/json');

$nama_bunda = $_POST['nama_bunda'];
$kontak_bunda = $_POST['kontak_bunda'];
$alamat_bunda = $_POST['alamat_bunda'];
$username_bunda = $_POST['username_bunda'];
$password_bunda = $_POST['username_bunda'];
$passwordHash = password_hash($password_bunda, PASSWORD_DEFAULT);
$status_bunda = "Inactive";
$role = "Bunda";
$nama_foto = "foto_default.png";
// TAMBAH DATA
$query= "INSERT INTO tb_bunda VALUES (NULL, '$nama_bunda', '$kontak_bunda', '$alamat_bunda', '$nama_foto', null, null)";
mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {

        //get Id bunda
        $getIdInster = mysqli_insert_id($conn);
        // TAMBAH AKUN LOGIN bunda
        $queryauth = "INSERT INTO tb_auth VALUES (NULL, '$getIdInster', '$username_bunda', '$passwordHash', '$status_bunda', '$role', null, null)";
        mysqli_query($conn, $queryauth);
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