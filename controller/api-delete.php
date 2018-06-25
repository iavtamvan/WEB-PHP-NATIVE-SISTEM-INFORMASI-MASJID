<?php

include("config.php");

if( isset($_GET['id_user']) ){

    // ambil id dari query string
    $id = $_GET['id_user'];

    // buat query hapus
    $sql = "DELETE FROM SIM_USER where id_user=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/tables/data-user.php');
    } else {
        die("gagal menghapus...");
    }

}
else if( isset($_GET['id_berita']) ){

    // ambil id dari query string
    $id = $_GET['id_berita'];

    // buat query hapus
    $sql = "DELETE FROM SIM_BERITA where id_berita=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/tables/data-berita.php');
    } else {
        die("gagal menghapus berita...");
    }

}
else if( isset($_GET['id_event']) ){

    // ambil id dari query string
    $id = $_GET['id_event'];

    // buat query hapus
    $sql = "DELETE FROM SIM_TAMBAH_EVENT where id_event=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/tables/data-event.php');
    } else {
        die("gagal menghapus berita...");
    }

}


else {
        header('Location: ../pages/examples/akses-ditolak.php');

    die("akses dilarang...");
}

?>