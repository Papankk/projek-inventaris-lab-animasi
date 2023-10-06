<?php
session_start();
include '../../../koneksi.php';

$id_judul = $_POST['id_judul'];
$id_pengajuan = $_POST['id_pengajuan'];

$queryview = mysqli_query($connect, "SELECT nama FROM tbl_pengajuan WHERE id_pengajuan = $id_pengajuan");
$row = mysqli_fetch_assoc($queryview);
$nama = $row['nama'];

$querydelete = mysqli_query($connect, "DELETE FROM tbl_pengajuan WHERE id_pengajuan = $id_pengajuan");

if ($querydelete) {
    $_SESSION['color'] = "success";
    $_SESSION['title'] = "Sukses!";
    $_SESSION['text'] = "Data berhasil dihapus!";

    $_SESSION['aktivitas'] = "Delete data <b>$nama</b> di tabel <b>Detail Pengajuan<b>";
    date_default_timezone_set("Asia/Jakarta");
    $_SESSION['waktu'] = date("Y-F-d H:i:s");
    $_SESSION['location'] = "pengajuan/detail.php?id=$id_judul";

    header("location: ../../log-aktivitas/insert.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
