<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($db,"select * from SIM_USER where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$user = mysqli_fetch_assoc($data);
// $id_user = echo $user['id_user'];
$id_user = "".$user['id_user'];
// echo "Data ini : " .$id_user;
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "Aktif";
	$_SESSION['id_user'] = $id_user;

$session_id_user = $_SESSION["id_user"]=$id_user;
echo "Session ID : " . $session_id_user;

if($cek > 0){
	header("location:../index.php?id_user=$session_id_user");
	$response["error"] = false;
    $response["error_msg"] = "Login Sukses";
    $response["rule"] = "Super Admin";
    echo json_encode($response);
	// echo "Sukses";
}else{
	// header("location:index.php?pesan=gagal");
	    header('Location: ../pages/examples/500.html');

	echo "Login Gagal";
}
?>