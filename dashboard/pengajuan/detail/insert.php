<?php
include "../../../koneksi.php";
session_start();

if (isset($_POST['submitinsert'])) {
    $id_judul = $_POST['id_judul'];
    $nama = $_POST['nama'];
    $spek = $_POST['spek'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $untuk = $_POST['untuk'];
    $urgensi = $_POST['urgensi'];

    $query = "INSERT INTO tbl_pengajuan (id_judul,nama,spek,jumlah,satuan,harga,total_harga,untuk,urgensi) VALUES ('$id_judul','$nama','$spek','$jumlah','$satuan','$harga','$harga' * '$jumlah','$untuk','$urgensi')";
    $query_run = mysqli_query($connect, $query);

    if ($query_run) {
        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Data berhasil di-input";

        $_SESSION['aktivitas'] = "Input data <b>$nama</b> di tabel <b>Detail Pengajuan<b>";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "pengajuan/detail.php?id=$id_judul";

        header("Location: ../../log-aktivitas/insert.php");
        exit(0);
    } else {
        $_SESSION['color'] = "danger";
        $_SESSION['title'] = "Gagal!";
        $_SESSION['text'] = "Data gagal di-input, silakan inputkan ulang!";
        header("Location: ../detail.php?id=$id_judul");
        exit(0);
    }
}
