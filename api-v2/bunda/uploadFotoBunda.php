<?php 
require_once '../../koneksi-v2.php';
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

$response = array();

if($_FILES['foto_bunda']) {

    $id_bunda = $_POST["id_bunda"];
    $foto = $_FILES["foto_bunda"]["name"];
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    $nama_foto = "image_".time().".".$ext;
    $foto_bunda_tmp_name = $_FILES["foto_bunda"]["tmp_name"];
    $error = $_FILES["foto_bunda"]["error"];

    if($error > 0){
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the file!"
        );
    }else {
        if(move_uploaded_file($foto_bunda_tmp_name , "../../assets/dist/img/bunda/image_".time().".png")) {
            $query = "UPDATE tb_bunda SET foto_bunda = '$nama_foto' WHERE id_bunda = '$id_bunda'";
            mysqli_query($conn, $query);
            $response = array(
                "status" => "success",
                "error" => false,
                "message" => "File uploaded successfully",
                "url" => "/bunda/image_".time().".png"
              );
        }else
        {
            $response = array(
                "status" => "error",
                "error" => true,
                "message" => "Error uploading the file!"
            );
        }
    }
}else{
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => "No file was sent!"
    );
}

echo json_encode($response);
?>