<?php
session_start();

include '../../koneksi.php';

if (isset($_POST['submit'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];
    $jumlah = $_POST['jumlah'];
    $sumber = $_POST['sumber'];
    $deskripsi = $_POST['deskripsi'];
    $kondisi_sebelum = $_POST['kondisi_sebelum'];
    $status = $_POST['status'];

    $queryupdate = "UPDATE tbl_barang
                SET nama_barang='$nama_barang', id_kategori='$id_kategori', jumlah='$jumlah', sumber='$sumber', deskripsi='$deskripsi', kondisi_sebelum='$kondisi_sebelum', status='$status' 
                WHERE id_barang='$id_barang' ";

    $result = mysqli_query($connect, $queryupdate);

    if ($result) {
        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Data berhasil di-edit!";

        $_SESSION['aktivitas'] = "Edit data <b>$nama_siswa</b> di tabel <b>Siswa<b>";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "siswa/";

        header("Location: ../log-aktivitas/insert.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($connect);
    }
}

mysqli_close($connect);
