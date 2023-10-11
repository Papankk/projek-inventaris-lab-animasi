<?php
session_start();

include '../../koneksi.php';

$id_siswa = $_POST['id_siswa'];

$queryview = mysqli_query($connect, "SELECT nama_siswa FROM tbl_siswa WHERE id_siswa ='$id_siswa'");
$queryupdate = mysqli_query($connect, "DELETE FROM tbl_siswa WHERE id_siswa='$id_siswa'");

$fetch = mysqli_fetch_assoc($queryview);

$nama_barang = $fetch['nama_siswa'];

if ($queryupdate) {
    $_SESSION['color'] = "success";
    $_SESSION['title'] = "Sukses!";
    $_SESSION['text'] = "Data berhasil dihapus!";

    $_SESSION['aktivitas'] = "Delete data <b>$nama_barang</b> di tabel <b>Barang<b>";
    date_default_timezone_set("Asia/Jakarta");
    $_SESSION['waktu'] = date("Y-F-d H:i:s");
    $_SESSION['location'] = "siswa/";

    header("Location: ../log-aktivitas/insert.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
