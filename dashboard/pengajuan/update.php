<?php
session_start();

include '../../koneksi.php';

$id_judul = $_POST['idjudul'];
$judul = $_POST['judul'];
$nodok = $_POST['nodok'];

$queryupdate = mysqli_query($connect, "UPDATE tbl_jdl_pengajuan SET nama = '$judul', nodok = '$nodok' WHERE id_judul = $id_judul ");

if ($queryupdate) {
    $_SESSION['color'] = "success";
    $_SESSION['title'] = "Sukses!";
    $_SESSION['text'] = "Data berhasil diedit!";

    $_SESSION['aktivitas'] = "Edit data pengajuan <b>$judul</b> di tabel <b>Pengajuan<b>";
    date_default_timezone_set("Asia/Jakarta");
    $_SESSION['waktu'] = date("Y-F-d H:i:s");
    $_SESSION['location'] = "pengajuan/";

    header("location: ../log-aktivitas/insert.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
