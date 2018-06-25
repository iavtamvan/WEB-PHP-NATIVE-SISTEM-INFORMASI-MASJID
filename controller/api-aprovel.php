<?php

include("config.php");

if( isset($_GET['id_user']) ){

    // ambil id dari query string
    $id = $_GET['id_user'];

    // buat query hapus
    $sql = "UPDATE SIM_USER SET status='Aktif' WHERE id_user=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/tables/data-user.php');
    } else {
        die("gagal update...");
    }

}
else if( isset($_GET['id_berita']) ){

    // ambil id dari query string
    $id = $_GET['id_berita'];

    // buat query hapus
    $sql = "UPDATE SIM_BERITA SET status_berita='Aktif' WHERE id_berita=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/tables/data-berita.php');
    } else {
        die("gagal update...");
    }

}
else if( isset($_GET['id_event']) ){

    // ambil id dari query string
    $id = $_GET['id_event'];

    // buat query hapus
    $sql = "UPDATE SIM_TAMBAH_EVENT SET status_event='Aktif' WHERE id_event=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../pages/tables/data-event.php');
    } else {
        die("gagal update...".$id);
    }

}


else {
    header('Location: ../pages/examples/akses-ditolak.php');
    die("akses dilarang...");
}

?>