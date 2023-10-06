<?php
session_start();

include '../../koneksi.php';

$id_siswa = $_POST['id_siswa'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$abjad = $_POST['abjad'];
$no_identitas = $_POST['no_identitas'];

$queryupdate = mysqli_query($connect, "UPDATE tbl_siswa SET nama_siswa='$nama_siswa', kelas='$kelas', jurusan='$jurusan', abjad='$abjad', no_identitas='$no_identitas' WHERE id_siswa='$id_siswa' ");

if ($queryupdate) {
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
