
<?php
include("config.php");
session_start();
$session_id = $_SESSION['id_user'];
echo "Session :  ".$session_id;
echo "Session :  ".$session_id;
echo "Session :  ".$session_id;


if (isset($session_id)) {

    if (isset($_POST['update_user'])) {
//    if ($_POST) {
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $ttl = $_POST['ttl'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];
        $nama_masjid = $_POST['nama_masjid'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // buat query
        $sql = "UPDATE SIM_USER SET nama='$nama',ttl='$ttl',jk='$jk',alamat='$alamat',agama='Islam',nama_masjid='$nama_masjid',username='$username',password='$password' WHERE id_user=$id_user";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if ($query) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: ../pages/forms/edit-user.php?id_user='.$id_user);
            $response["error"] = false;
            $response["id_user"] = $id_user;
            $response["error_msg"] = "Edit Profil Sukses";
            echo json_encode($response);


        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
//            header('Location: ../pages/examples/500.html');
            $response["error"] = false;
            $response["error_msg"] = "Edit Profil Gagal kesalahan terjadi pada " . $nama;
            echo json_encode($response);
        }
    }

    if (isset($_POST['edit_berita'])) {
//    if ($_POST) {
        $id_berita = $_POST['id_berita'];
        $nama_pembuat_berita = $_POST['nama_pembuat_berita'];
        $judul_berita = $_POST['judul_berita'];
        $tgl_berita = $_POST['tgl_berita'];
        $deskripsi_berita = $_POST['deskripsi_berita'];
        $jam_berita = $_POST['jam_berita'];

        // buat query


        $sql = "UPDATE SIM_BERITA SET id_user='$session_id',nama_pembuat_berita='$nama_pembuat_berita',judul_berita='$judul_berita',tgl_berita='$tgl_berita',deskripsi_berita='$deskripsi_berita',jam_berita='$jam_berita' WHERE id_berita = '$id_berita'";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if ($query) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: ../pages/tables/data-berita.php');
            $response["error"] = false;
            $response["id_user"] = $session_id;
            $response["id_berita"] = $id_berita;
            $response["error_msg"] = "Edit Berita Sukses";
            echo json_encode($response);


        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
//            header('Location: ../pages/examples/500.html');
            $response["error"] = false;
            $response["error_msg"] = "Edit Berita Gagal kesalahan terjadi pada " . $nama;
            echo json_encode($response);
        }
    }

    if (isset($_POST['edit_event'])) {
//    if ($_POST) {
        $id_event = $_POST['id_event'];
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

        // buat query

        $sql = "UPDATE SIM_TAMBAH_EVENT SET judul_event='$judul_event',nama_masjid='$nama_masjid',pengelola_event='$pengelola_event',
        kategori_event='$kategori_event',tgl_event='$tgl_event',kota_event='$kota_event',alamat_event='$alamat_event',waktu_mulai_event='$waktu_mulai_event',
        waktu_selesai_event='$waktu_selesai_event',kuota_event='$kuota_event',deskripsi_event='$deskripsi_event' WHERE id_event = $id_event";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if ($query) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: ../pages/tables/data-event.php');
            $response["error"] = false;
            $response["id_user"] = $session_id;
            $response["id_berita"] = $id_event;
            $response["error_msg"] = "Edit Event Sukses";
            echo json_encode($response);


        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
//            header('Location: ../pages/examples/500.html');
            $response["error"] = false;
            $response["error_msg"] = "Edit Event Gagal kesalahan terjadi pada " . $nama;
//            $response["error_msg_id_event"] = "$id_event";
//            $response["error_msg_judul_event"] = "$judul_event";
//            $response["error_msg_nama_masjid"] = "$nama_masjid";
//            $response["error_msg_pengelola_event"] = "$pengelola_event";
//            $response["error_msg_kategori_event"] = "$kategori_event";
//            $response["error_msg_tgl_event"] = "$tgl_event";
//            $response["error_msg_kota_event"] = "$kota_event";
//            $response["error_msg_alamat_event"] = "$alamat_event";
//            $response["error_msg_waktu_mulai_event"] = "$waktu_mulai_event";
//            $response["error_msg_waktu_selesai_event"] = "$wakowes tu_selesai_event";
//            $response["error_msg_kuota_event"] = "$kuota_event";
//            $response["error_msg_deskripsi_event"] = "$deskripsi_event";
            echo json_encode($response);
        }
    }


}

    else {
        header('Location: ../pages/examples/akses-ditolak.php');
        die("Akses dilarang...");
}
?>