<?php
include "../../koneksi.php";
session_start();

$user = $_SESSION['username'];
$aktivitas = $_SESSION['aktivitas'];
$waktu = $_SESSION['waktu'];
$location = $_SESSION['location'];

$query = "INSERT INTO tbl_log VALUES ('', '$user', '$aktivitas', '$waktu', 0)";
$query_run = mysqli_query($connect, $query);

if ($query_run) {
    unset($_SESSION['aktivitas']);
    unset($_SESSION['waktu']);
    header("location: ../$location");
    exit(0);
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['title'] = "Gagal!";
    $_SESSION['text'] = "Data gagal di-input, silakan inputkan ulang!";
    header("Location: ../$location");
    exit(0);
}
