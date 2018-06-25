<?php
include("config.php");
session_start();
$session_id = $_SESSION['id_user'];
$gambar_berita = $_SESSION['gambar_berita'];

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['tambah_berita'])) {
// if($_POST){
    // ambil data dari formulir
//    $id_user = $_POST['id_user'];
    $nama_pembuat_berita = $_POST['nama_pembuat_berita'];
    $judul_berita = $_POST['judul_berita'];
    $tgl_berita = $_POST['tgl_berita'];
    $deskripsi_berita = $_POST['deskripsi_berita'];
    $jam_berita = $_POST['jam_berita'];
    $image_berita = $_POST['image_berita'];

    // buat query

    $sql = "INSERT INTO SIM_BERITA
    (id_user, nama_pembuat_berita, judul_berita, tgl_berita, deskripsi_berita, jam_berita, image_berita, status_berita) 
    VALUE ('$session_id', '$nama_pembuat_berita', '$judul_berita','$tgl_berita', '$deskripsi_berita', '$jam_berita', '$gambar_berita', 'Pending')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        $response["error"] = false;
        $response["error_msg"] = "Berita Sukses di Tambahkan";
        $response["error_msg_id"] = $session_id;
        $response["error_msg_image"] = $gambar_berita;
        $response["error_msg_status_release"] = "Pending";
        header('Location: ../pages/tables/data-berita.php');


        echo json_encode($response);
    } else {
        $response["error"] = true;
        $response["error_msg"] = "Event Gagal di Tambahkan";
        $response["error_msg_id"] = $session_id;
        $response["error_msg_image"] = $gambar_berita;
        echo json_encode($response);

        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: ../pages/examples/404.html');

    }


} else {
     $response["error_msg"] = "Akses ditolak";
     echo json_encode($response);
//    die("Akses dilarang...");
}

?>