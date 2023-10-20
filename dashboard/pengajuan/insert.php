<?php
session_start();
include("../../koneksi.php");

if (isset($_POST['submitinsert'])) {
    $judul = $_POST['judul'];
    $nodok = $_POST['nodok'];

    $sql = "INSERT INTO tbl_jdl_pengajuan VALUES ('', '$judul', '$nodok')";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Data berhasil ditambahkan!";

        $_SESSION['aktivitas'] = "Mengajukan alat & bahan dengan judul <b>$judul</b>";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "pengajuan/";

        header("Location: ../log-aktivitas/insert.php");
    } else {
        $_SESSION['color'] = "danger";
        $_SESSION['title'] = "Error!";
        $_SESSION['text'] = "Data gagal ditambahkan!";
        header('Location: ../pengajuan');
    }
} else {
    die("Akses dilarang...");
}
