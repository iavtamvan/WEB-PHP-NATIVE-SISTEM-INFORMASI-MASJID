<?php
session_start();
$session_id = $_SESSION['id_user'];
include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['tambah_event'])) {
// if($_POST){
    // ambil data dari formulir
    $id_user = $_POST['id_user'];
    $judul_event = $_POST['judul_event'];
    $nama_masjid = $_POST['nama_masjid'];
    $pengelola_event = $_POST['pengelola_event'];
    $kategori_event = $_POST['kategori_event'];
    $tgl_event = $_POST['tgl_event'];
    $kota_event = $_POST['kota_event'];
    $alamat_event = $_POST['alamat_event'];
    $waktu_mulai_event = $_POST['waktu_mulai_event'];
    $waktu_selesai_event = $_POST['waktu_selesai_event'];
    $kuota_event = $_POST['kuota_event'];
    $deskripsi_event = $_POST['deskripsi_event'];
    $status_event = $_POST['status_event'];

    // buat query

    $sql = "INSERT INTO SIM_TAMBAH_EVENT 
    (id_user, judul_event, nama_masjid, pengelola_event, kategori_event, tgl_event, kota_event, alamat_event, waktu_mulai_event, waktu_selesai_event, kuota_event, deskripsi_event, status_event) 
    VALUE ('$session_id', '$judul_event', '$nama_masjid','$pengelola_event', '$kategori_event', '$tgl_event', '$kota_event', '$alamat_event', '$waktu_mulai_event', '$waktu_selesai_event', '$kuota_event', '$deskripsi_event', 'Pending')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        $response["error"] = false;
        $response["error_msg"] = "Event Sukses di Tambahkan";
        $response["error_id_user"] = $session_id;
        $response["error_queery"] = $query;
        $response["error__judul_event"] = $judul_event;
        $response["error__nama_masjid"] = $nama_masjid;
        $response["error__pengelola_event"] = $pengelola_event;
        $response["error__kategori_event"] = $kategori_event;
        $response["error__tgl_event"] = $tgl_event;
        $response["error__kota_event"] = $kota_event;
        $response["error__alamat_event"] = $alamat_event;
        $response["error__waktu_mulai_event"] = $waktu_mulai_event;
        $response["error__waktu_selesai_event"] = $waktu_selesai_event;
        $response["error___kuota_event"] = $kuota_event;
        $response["error___deskripsi_event"] = $deskripsi_event;
        header('Location: ../pages/tables/data-event.php');
        // $response["error_msg"] = "Regiter Sukses";
        // $response["error_msg"] = "Regiter Sukses";
        // $response["error_msg"] = "Regiter Sukses";

        echo json_encode($response);
    } else {
        $response["error"] = true;
        $response["error_msg"] = "Event Gagal di Tambahkan";
        $response["error_id_user"] = $session_id;
        $response["error_queery"] = $query;
        $response["error__judul_event"] = $judul_event;
        $response["error__nama_masjid"] = $nama_masjid;
        $response["error__pengelola_event"] = $pengelola_event;
        $response["error__kategori_event"] = $kategori_event;
        $response["error__tgl_event"] = $tgl_event;
        $response["error__kota_event"] = $kota_event;
        $response["error__alamat_event"] = $alamat_event;
        $response["error__waktu_mulai_event"] = $waktu_mulai_event;
        $response["error__waktu_selesai_event"] = $waktu_selesai_event;
        $response["error___kuota_event"] = $kuota_event;
        $response["error___deskripsi_event"] = $deskripsi_event;
        echo json_encode($response);

        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
//        header('Location: ../pages/examples/404.html');

    }


} else {
    die("Akses dilarang...");
}

?>