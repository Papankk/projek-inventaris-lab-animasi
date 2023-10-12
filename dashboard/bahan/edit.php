<?php
session_start();

include '../../koneksi.php';

if (isset($_POST['submit'])) {
    $id_bahan = $_POST['id_bahan'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $tanggal = $_POST['tanggal'];
    $asal_bahan = $_POST['asal_bahan'];
    $keterangan = $_POST['keterangan'];

    $queryupdate = "UPDATE tbl_bahan
                SET nama='$nama', jumlah='$jumlah', satuan='$satuan', tanggal='$tanggal', asal_bahan='$asal_bahan', keterangan='$keterangan' 
                WHERE id_bahan='$id_bahan' ";

    $result = mysqli_query($connect, $queryupdate);

    if ($result) {
        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Data berhasil di-edit!";

        $_SESSION['aktivitas'] = "Edit data <b>$nama</b> di tabel <b>Bahan<b>";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "bahan/";

        header("Location: ../log-aktivitas/insert.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($connect);
    }
}

mysqli_close($connect);
