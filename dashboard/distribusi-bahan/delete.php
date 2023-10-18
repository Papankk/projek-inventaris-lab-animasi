<?php
session_start();

include '../../koneksi.php';

$id_distribusi = $_POST['id_distribusi'];

$queryview = mysqli_query($connect, "SELECT * FROM tbl_distribusi WHERE id_distribusi ='$id_distribusi'");
$queryupdate = mysqli_query($connect, "DELETE FROM tbl_distribusi WHERE id_distribusi='$id_distribusi'");

$fetch = mysqli_fetch_assoc($queryview);

$nama_pengambil = $fetch['nama_pengambil'];
$nama_bahan = $fetch['nama_bahan'];

if ($queryupdate) {
    $_SESSION['color'] = "success";
    $_SESSION['title'] = "Sukses!";
    $_SESSION['text'] = "Data berhasil dihapus!";

    $_SESSION['aktivitas'] = "Delete data distribusi dari <b>$nama_pengambil</b> dengan bahan <b>$nama_bahan</b>";
    date_default_timezone_set("Asia/Jakarta");
    $_SESSION['waktu'] = date("Y-F-d H:i:s");
    $_SESSION['location'] = "distribusi-bahan/";

    header("Location: ../log-aktivitas/insert.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($connect);
}
