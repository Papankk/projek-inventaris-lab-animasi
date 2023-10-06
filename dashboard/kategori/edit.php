<?php
session_start();

include 'koneksi.php';

$id_kategori = $_POST['id_kategori'];
$kategori = $_POST['nama_kategori'];

$queryupdate = mysqli_query($db, "UPDATE tbl_kategori SET nama_kategori='$kategori' WHERE id_kategori='$id_kategori' ");

if ($queryupdate) {
    $_SESSION['pesan'] = "Data berhasil diedit!";
    header("location: index.php");    
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}
?>