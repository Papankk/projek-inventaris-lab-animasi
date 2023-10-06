<?php
session_start();

include '../../koneksi.php';

$id_peminjaman = $_POST['id_peminjaman'];
$nama_peminjam = $_POST['nama_peminjam'];
$kelas = $_POST['kelas'];
$no_identitas = $_POST['no_identitas'];
$nama_barang = $_POST['nama_barang'];
$waktu_pinjam = $_POST['waktu_pinjam'];
$waktu_kembali = $_POST['waktu_kembali'];
$status = $_POST['status_peminjaman'];

$queryupdate = mysqli_query($connect, "UPDATE tbl_peminjaman,tbl_barang SET nama_peminjam='$nama_peminjam', kelas='$kelas', no_identitas='$no_identitas', nama_barang='$nama_barang', waktu_pinjam='$waktu_pinjam', waktu_kembali='$waktu_kembali', status_peminjaman='$status' WHERE id_peminjaman='$id_peminjaman' ");

if ($queryupdate) {
    $_SESSION['color'] = "success";
    $_SESSION['title'] = "Sukses!";
    $_SESSION['text'] = "Data berhasil di-edit!";

    $_SESSION['aktivitas'] = "Nama Siswa <b>$nama_siswa</b> Meminjam Barang <b>$nama_barang</b>";
    date_default_timezone_set("Asia/Jakarta");
    $_SESSION['waktu'] = date("Y-F-d H:i:s");
    $_SESSION['location'] = "peminjaman/";

    header("Location: ../log-aktivitas/insert.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($connect);
}
