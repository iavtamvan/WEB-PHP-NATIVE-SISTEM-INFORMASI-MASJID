<?php include("controller/config.php");
session_start();
$session_id = $_SESSION['id_user'];

if( isset($session_id) ){

    // ambil id dari query string
    $session_id_user = $_SESSION['id_user'];
    $id = $_GET['id_user'];


    // buat query hapus
    $sql = "SELECT * FROM SIM_USER Where id_user=$session_id_user";
    $sql_rows = mysqli_query($db, "SELECT * FROM SIM_USER");
    $sql_user_pending = mysqli_query($db, "SELECT * FROM SIM_USER Where status='Pending'");
    $sql_user_aktif = mysqli_query($db, "SELECT * FROM SIM_USER Where status='Aktif'");
    $sql_total_berita = mysqli_query($db, "SELECT * FROM SIM_BERITA");
    $sql_total_event = mysqli_query($db, "SELECT * FROM SIM_TAMBAH_EVENT");

    $query = mysqli_query($db, $sql);
    $user = mysqli_fetch_assoc($query);
    $cek = mysqli_num_rows($sql_rows);
    $user_pending = mysqli_num_rows($sql_user_pending);
    $user_aktif = mysqli_num_rows($sql_user_aktif);
    $total_berita = mysqli_num_rows($sql_total_berita);
    $total_event = mysqli_num_rows($sql_total_event);

} else {
    header('Location: pages/examples/logged.html');
    die("akses dilarang...");
}
// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    header('Location: ../pages/examples/nulldata.html');
    die("data tidak ditemukan...");
}
?>