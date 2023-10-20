<?php
session_start();

include '../../koneksi.php';

$nama_sarpras = $_POST['nama_sarpras'];
$nip_sarpras = $_POST['nip_sarpras'];
$nama_kepsek = $_POST['nama_kepsek'];
$nip_kepsek = $_POST['nip_kepsek'];
$nama_kabeng = $_POST['nama_kabeng'];
$nip_kabeng = $_POST['nip_kabeng'];

$queryupdate = mysqli_query($connect, "UPDATE tbl_setting SET nama_sarpras = '$nama_sarpras', nip_sarpras = '$nip_sarpras', nama_kepsek = '$nama_kepsek', nip_kepsek = '$nip_kepsek', nama_kabeng = '$nama_kabeng', nip_kabeng = '$nip_kabeng'");

if ($queryupdate) {
    $_SESSION['color'] = "success";
    $_SESSION['title'] = "Sukses!";
    $_SESSION['text'] = "Data berhasil diedit!";

    $_SESSION['aktivitas'] = "Mengubah master setting";
    date_default_timezone_set("Asia/Jakarta");
    $_SESSION['waktu'] = date("Y-F-d H:i:s");
    $_SESSION['location'] = "master-setting/";

    header("location: ../log-aktivitas/insert.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
