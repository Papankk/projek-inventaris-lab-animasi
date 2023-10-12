<?php
session_start();
include("../../koneksi.php");

if (isset($_POST['submitinsert'])) {
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $tanggal = $_POST['tanggal'];
    $asal_bahan = $_POST['asal_bahan'];
    $keterangan = $_POST['keterangan'];

    $insert_query = mysqli_query($connect, "INSERT INTO tbl_bahan (nama, jumlah, satuan, tanggal, asal_bahan, keterangan) VALUES ('$nama', '$jumlah', '$satuan', '$tanggal', '$asal_bahan', '$keterangan')");

    if ($insert_query) {
        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Data berhasil di-insert!";

        $_SESSION['aktivitas'] = "Input data <b>$nama</b> di tabel <b>Bahan<b>";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "bahan/";

        header("Location: ../log-aktivitas/insert.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
