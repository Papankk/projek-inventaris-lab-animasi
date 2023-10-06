<?php
session_start();
include "../../koneksi.php";

$username1 = $_POST['username'];


if ($username1 == $_SESSION['username']) {
    $_SESSION['color'] = "danger";
    $_SESSION['title'] = "Error!";
    $_SESSION['text'] = "Anda tidak bisa menghapus data anda sendiri!";
    header("location: ../admin");
} else {
    $queryselect = mysqli_query($connect, "SELECT foto_profil FROM tbl_user WHERE username = '$username1'");
    $data = mysqli_fetch_assoc($queryselect);
    $querydelete = mysqli_query($connect, "DELETE FROM tbl_user WHERE username='$username1'");
    if ($querydelete) {

        if ($data['foto_profil'] != "default.png") {
            unlink('../../assets/img/' . $data['foto_profil']);
        }

        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Admin Berhasil Dihapus!";

        $_SESSION['aktivitas'] = "Delete Admin <b>$username1</b>";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "admin/";

        header("location: ../log-aktivitas/insert.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($connect);
    }
}
