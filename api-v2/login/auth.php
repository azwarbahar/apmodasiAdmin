<?php
 require_once '../../koneksi-v2.php';
 header('Content-type: application/json');
 $username = $_GET["username"];
 $password = $_GET["password"];
 $ray = array();
 $query = "SELECT * FROM tb_auth WHERE username='$username'";
 $sql = mysqli_query($conn, $query);
 $row_pass = mysqli_fetch_assoc($sql);
 if ($row_pass){
    if (password_verify($password, $row_pass["password"])) {
        $ray=$row_pass;
        echo json_encode(array("kode" => "1", "auth_result" => $ray));
    } else{
        echo json_encode(array("kode" => "2", "pesan" => "Password tidak sesuai"));
    }
 } else {
    echo json_encode(array("kode" => "0", "pesan" => "Username tidak ditemukan"));
 }
?>