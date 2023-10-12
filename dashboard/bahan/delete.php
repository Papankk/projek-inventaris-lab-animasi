<?php
session_start();

include '../../koneksi.php';

$id_bahan = $_POST['id_barang'];

$queryview = mysqli_query($connect, "SELECT nama FROM tbl_bahan WHERE id_bahan ='$id_bahan'");
$queryupdate = mysqli_query($connect, "DELETE FROM tbl_bahan WHERE id_bahan='$id_bahan'");

$fetch = mysqli_fetch_assoc($queryview);

$nama_barang = $fetch['nama'];

if ($queryupdate) {
    $_SESSION['color'] = "success";
    $_SESSION['title'] = "Sukses!";
    $_SESSION['text'] = "Data berhasil dihapus!";

    $_SESSION['aktivitas'] = "Delete data <b>$nama_barang</b> di tabel <b>Bahan<b>";
    date_default_timezone_set("Asia/Jakarta");
    $_SESSION['waktu'] = date("Y-F-d H:i:s");
    $_SESSION['location'] = "bahan/";

    header("Location: ../log-aktivitas/insert.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($connect);
}
