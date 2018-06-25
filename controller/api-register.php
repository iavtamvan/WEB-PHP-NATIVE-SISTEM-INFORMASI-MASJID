<?php

include("config.php");
session_start();
$session_id = $_SESSION['id_user'];
if (isset($session_id)) {


// cek apakah tombol daftar sudah diklik atau blum?
    if (isset($_POST['register'])) {
// if($_POST){
        // ambil data dari formulir
        $nama = $_POST['nama'];
        $ttl = $_POST['ttl'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];
        $rule = $_POST['rule'];
        $nama_masjid = $_POST['nama_masjid'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hash = $_POST['password_hash'];
        $status = $_POST['status'];

        // buat query

        $sql = "INSERT INTO SIM_USER 
    (nama, ttl, jk, alamat, agama, rule, nama_masjid, username, password, status) VALUE 
    ('$nama', '$ttl', '$jk', '$alamat', '$agama', 'user', '$nama_masjid', '$username', '$password', 'Pending') where id_user=$session_id";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if ($query) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: ../pages/login.html');
            $response["error"] = false;
            $response["error_msg"] = "Regiter Sukses";
            echo json_encode($response);
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: ../pages/examples/404.html');

        }


    } else if (isset($_POST['daftarform'])) {
        $nama = $_POST['nama'];
        $ttl = $_POST['ttl'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];
        $rule = $_POST['rule'];
        $nama_masjid = $_POST['nama_masjid'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        // buat query

        $sql = "INSERT INTO SIM_USER 
    (nama, ttl, jk, alamat, agama, rule, nama_masjid, username, password, status) VALUE 
    ('$nama', '$ttl', '$jk', '$alamat', 'Islam', 'user', '$nama_masjid', '$username', '$password', 'Pending')";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if ($query) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: ../pages/forms/tambah-data-user.php');
            $response["error"] = false;
            $response["error_msg"] = "Regiter Sukses";
            echo json_encode($response);
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: ../pages/examples/404.html');
        }

    } elseif (isset($_POST['updateform'])) {
        $nama = $_POST['nama'];
        $ttl = $_POST['ttl'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];
        $nama_masjid = $_POST['nama_masjid'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // buat query

        $sql = "UPDATE SIM_USER SET nama=$nama,ttl=$ttl,jk=$jk,alamat=$alamat,agama='Islam',nama_masjid=$nama_masjid,username=$username,password=$password WHERE id_user=$session_id";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if ($query) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: ../pages/forms/api-edit-user.php');
            $response["error"] = false;
            $response["error_msg"] = "Edit Sukses";
            echo json_encode($response);
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: ../pages/examples/500.html');
        }
    } else {
        die("Akses dilarang...");
    }


} else{
    header('Location: ../pages/examples/akses-ditolak.php');
}

?>