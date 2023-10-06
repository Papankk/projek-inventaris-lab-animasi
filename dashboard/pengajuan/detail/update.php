<?php
include "../../../koneksi.php";
session_start();

$id_judul = $_POST['id_judul'];
$id_pengajuan = $_POST['id_pengajuan'];
$nama = $_POST['nama'];
$spek = $_POST['spek'];
$jumlah = $_POST['jumlah'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];
$untuk = $_POST['untuk'];
$urgensi = $_POST['urgensi'];

$queryupdate = mysqli_query($connect, "UPDATE tbl_pengajuan SET nama = '$nama', spek = '$spek' , jumlah = '$jumlah' , satuan = '$satuan' , harga = '$harga' , total_harga = $harga * $jumlah , untuk = '$untuk' , urgensi = '$urgensi' WHERE id_pengajuan = $id_pengajuan ");

if ($queryupdate) {
    $_SESSION['color'] = "success";
    $_SESSION['title'] = "Sukses!";
    $_SESSION['text'] = "Data berhasil diedit!";

    $_SESSION['aktivitas'] = "Edit data <b>$nama</b> di tabel <b>Detail Pengajuan<b>";
    date_default_timezone_set("Asia/Jakarta");
    $_SESSION['waktu'] = date("Y-F-d H:i:s");
    $_SESSION['location'] = "pengajuan/detail.php?id=$id_judul";

    header("location: ../../log-aktivitas/insert.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}
