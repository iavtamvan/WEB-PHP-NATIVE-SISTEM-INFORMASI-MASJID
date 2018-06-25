<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/19/18
 * Time: 9:40 AM
 */
session_start();
$target_dir = "../images/berita_";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["tambah_berita"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
//
//        $result = array("result_uplaod" => "SUkses");
//        echo json_encode($result);

        $uploadOk = 1;
    } else {
//        $result = array("result " => "File is not an image");
//        echo json_encode($result);
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
//    $result = array("result" => "Sorry, file already exists");
//    echo json_encode($result);
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $result = array("result" => "Sorry, your file is too large.");
    echo json_encode($result);
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $result = array("result" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    echo json_encode($result);
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
//    $result = array("result" => "Sorry, your file was not uploaded.");
//    echo json_encode($result);
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $result = array("result" => "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");
        $result_nama_file_berita = "www.iav.com/images/berita_".basename($_FILES["fileToUpload"]["name"]);
        $_SESSION['gambar_berita'] =  $result_nama_file_berita;
        include ("api-tambah-berita.php");

//        $session_id = $_SESSION['gambar_berita'];
//        echo json_encode($result_nama_file_berita);
    } else {

        $result = array("result" => "Sorry, there was an error uploading your file.");
        echo json_encode($result);
    }
}

?>