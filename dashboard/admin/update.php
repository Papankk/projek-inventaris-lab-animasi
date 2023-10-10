<?php
session_start();

include '../../koneksi.php';

$username = $_POST["username"];
$role = $_POST['role'];

if ($username == $_SESSION['username']) {
    $_SESSION['color'] = "danger";
    $_SESSION['title'] = "Error!";
    $_SESSION['text'] = "Anda tidak bisa meng-edit data anda sendiri!";

    header("location: ../admin");
} else {

    $queryupdate = mysqli_query($connect, "UPDATE tbl_user SET role='$role' WHERE username='$username' ");

    if ($queryupdate) {
        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Data berhasil di-edit!";

        $_SESSION['aktivitas'] = "Mengubah role $username";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "siswa/";

        header("Location: ../log-aktivitas/insert.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($connect);
    }
}
