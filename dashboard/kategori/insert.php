<?php
session_start();
include("koneksi.php");

if (isset($_POST['submitinsert'])) {
    $kategori = $_POST['nama_kategori'];

    $sql = "INSERT INTO tbl_kategori VALUES ('', '$kategori')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['pesan'] = "Data berhasil ditambahkan!";
        header('Location: index.php');
    } else {
        header('Location: index.php');
    }
} else {
    die("Akses dilarang...");
}
?>
