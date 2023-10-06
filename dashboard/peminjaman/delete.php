<?php
session_start();

include '../../koneksi.php';

$id_peminjaman = $_POST['id_peminjaman'];

$queryview = mysqli_query($connect, "SELECT id_barang, id_siswa FROM tbl_peminjaman WHERE id_peminjaman = '$id_peminjaman'");

$fetch = mysqli_fetch_assoc($queryview);
$id_barang = $fetch['id_barang'];
$id_siswa = $fetch['id_siswa'];

$querybarang = mysqli_query($connect, "SELECT * FROM tbl_barang WHERE id_barang = $id_barang");
$querysiswa = mysqli_query($connect, "SELECT * FROM tbl_siswa WHERE id_siswa = $id_siswa");

$fetch_barang = mysqli_fetch_assoc($querybarang);
$fetch_siswa = mysqli_fetch_assoc($querysiswa);

$nama_barang = $fetch_barang['nama_barang'];
$nama_siswa = $fetch_siswa['nama_siswa'];

$querydelete = mysqli_query($connect, "DELETE FROM tbl_peminjaman WHERE id_peminjaman='$id_peminjaman'");

if ($querydelete) {
    $_SESSION['color'] = "success";
    $_SESSION['title'] = "Sukses!";
    $_SESSION['text'] = "Data berhasil di-hapus!";

    $_SESSION['aktivitas'] = "Menghapus Pinjaman <b>$nama_barang</b> dari Siswa <b>$nama_siswa</b> ";
    date_default_timezone_set("Asia/Jakarta");
    $_SESSION['waktu'] = date("Y-F-d H:i:s");
    $_SESSION['location'] = "peminjaman/";

    header("Location: ../log-aktivitas/insert.php");
} else {
    echo "ERROR, data gagal dihapus" . mysqli_error($connect);
}
