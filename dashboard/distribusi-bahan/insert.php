<?php
session_start();
include("../../koneksi.php");

if (isset($_POST['submitinsert'])) {
    $nama_pengambil = $_POST['nama_pengambil'];
    $jabatan = $_POST['jabatan'];
    $bahan = $_POST['bahan'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $tanggal = $_POST['tanggal'];
    $asal_bahan = $_POST['asal_bahan'];
    $keterangan = $_POST['keterangan'];

    $insert_query = mysqli_query($connect, "INSERT INTO tbl_distribusi (nama_pengambil, jabatan, nama_bahan, jumlah, satuan, tgl_pengambilan, asal_bahan, keterangan)VALUES ('$nama_pengambil', '$jabatan', '$bahan', '$jumlah', '$satuan', '$tanggal', '$asal_bahan', '$keterangan')");

    if ($insert_query) {
        // Jika berhasil INSERT, Anda bisa mengirimkan pesan ke halaman sebelumnya
        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Data berhasil di-insert!";

        $_SESSION['aktivitas'] = "<b>$nama_pengambil</b> Mengambil Bahan <b>$bahan</b>";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "distribusi-bahan/";

        header("Location: ../log-aktivitas/insert.php");
    } else {
        // Jika gagal INSERT, tampilkan pesan error
        echo "Error: " . mysqli_error($connect);
    }


    // Eksekusi query INSERT
}
