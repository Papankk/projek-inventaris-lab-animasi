<?php
session_start();

include '../../koneksi.php';

$id_judul = $_POST['idjudul'];
$nama = $_POST['nama'];

$querydelete = mysqli_query($connect, "DELETE FROM tbl_jdl_pengajuan WHERE id_judul='$id_judul'");
$querydelete1 = mysqli_query($connect, "DELETE FROM tbl_pengajuan WHERE id_judul='$id_judul'");

if ($querydelete) {
    $_SESSION['color'] = "success";
    $_SESSION['title'] = "Sukses!";
    $_SESSION['text'] = "Data berhasil dihapus!";

    $_SESSION['aktivitas'] = "Delete data pengajuan <b>$nama</b> di tabel <b>Pengajuan<b>";
    date_default_timezone_set("Asia/Jakarta");
    $_SESSION['waktu'] = date("Y-F-d H:i:s");
    $_SESSION['location'] = "pengajuan/";

    header("location: ../log-aktivitas/insert.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
