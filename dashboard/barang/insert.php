<?php
session_start();
include("../../koneksi.php");

if (isset($_POST['submitinsert'])) {
    $jumlah = $_POST['jumlah'];
    $id_kategori = $_POST['id_kategori'];
    $sumber = $_POST['sumber'];
    $deskripsi = $_POST['deskripsi'];
    $kondisi_sebelum = $_POST['kondisi_sebelum'];
    $status = $_POST['status'];

    for ($i = 1; $i <= $jumlah; $i++) {
        $nama_barang = $_POST['nama_barang'] . "-" . $i;

        $insert_query = mysqli_query($connect, "INSERT INTO tbl_barang (nama_barang, id_kategori, sumber, deskripsi, kondisi_sebelum, status) VALUES ('$nama_barang', '$id_kategori', '$sumber', '$deskripsi', '$kondisi_sebelum', '$status')");
    }

    if ($insert_query) {
        // Jika berhasil INSERT, Anda bisa mengirimkan pesan ke halaman sebelumnya
        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Data berhasil di-insert!";

        $_SESSION['aktivitas'] = "Input data <b>$i x " .  $_POST['nama_barang'] . "</b> di tabel <b>Barang<b>";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "barang/";

        header("Location: ../log-aktivitas/insert.php");
    } else {
        // Jika gagal INSERT, tampilkan pesan error
        echo "Error: " . mysqli_error($connect);
    }


    // Eksekusi query INSERT
}
