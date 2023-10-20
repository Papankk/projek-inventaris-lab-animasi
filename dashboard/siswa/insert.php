<?php
session_start();

include("../../koneksi.php");

if (isset($_POST["submitinsert"])) {
    // Ambil data dari form
    $nama_siswa = $_POST["nama_siswa"];
    $kelas = $_POST["kelas"];
    $jurusan = $_POST['jurusan'];
    $abjad = $_POST['abjad'];
    $no_identitas = $_POST["no_identitas"];

    // Query untuk INSERT data ke dalam tabel
    $query = "INSERT INTO tbl_siswa (nama_siswa, kelas, jurusan, abjad, no_identitas) VALUES ('$nama_siswa', '$kelas', '$jurusan','$abjad', '$no_identitas')";

    if (mysqli_query($connect, $query)) {
        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Data berhasil di-insert!";

        $_SESSION['aktivitas'] = "Input data <b>$nama_siswa</b> di tabel <b>Siswa<b>";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "siswa/";

        header("Location: ../log-aktivitas/insert.php");
    } else {
        $_SESSION['pesan'] = "Terjadi kesalahan saat menyimpan data: " . mysqli_error($connect);
    }
}
