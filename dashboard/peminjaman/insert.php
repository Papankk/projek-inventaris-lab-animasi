<?php
session_start();

include("../../koneksi.php");

if (isset($_POST["submitinsert"])) {
    $nama_siswa = $_POST["nama_siswa"];
    $kelas = $_POST["kelas"];
    $jurusan = $_POST['jurusan'];
    $abjad = $_POST['abjad'];
    $no_identitas = $_POST["no_identitas"];
    $id_barang = $_POST['id_barang'];
    $waktu_pinjam = $_POST['waktu_pinjam'];
    $waktu_kembali = $_POST['waktu_kembali'];
    $kondisi_sesudah = $_POST['kondisi_sesudah']; // Set status sesudah menjadi "Pending"
    $status_peminjaman = $_POST['status_peminjaman'];

    // Cari id_siswa berdasarkan nama siswa yang dipilih
    $querybarang = mysqli_query($connect, "SELECT nama_barang FROM tbl_barang WHERE id_barang = $id_barang");
    $fetch = mysqli_fetch_assoc($querybarang);
    $nama_barang = $fetch['nama_barang'];
    $query_cari_id = "SELECT id_siswa FROM tbl_siswa WHERE nama_siswa = '$nama_siswa'";
    $result = mysqli_query($connect, $query_cari_id);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id_siswa = $row['id_siswa'];

        $insert_peminjaman = "INSERT INTO tbl_peminjaman (id_siswa, id_barang, waktu_pinjam, waktu_kembali, kondisi_sesudah, status_peminjaman) VALUES ('$id_siswa', '$id_barang', '$waktu_pinjam', '$waktu_kembali', '$kondisi_sesudah', '$status_peminjaman')";
        $tambah_data = mysqli_query($connect, $insert_peminjaman);

        if ($tambah_data) {
            $_SESSION['color'] = "success";
            $_SESSION['title'] = "Sukses!";
            $_SESSION['text'] = "Data berhasil di-insert!";

            $_SESSION['aktivitas'] = "Nama Siswa <b>$nama_siswa</b> Meminjam Barang <b>$nama_barang</b>";
            date_default_timezone_set("Asia/Jakarta");
            $_SESSION['waktu'] = date("Y-F-d H:i:s");
            $_SESSION['location'] = "peminjaman/";

            header("Location: ../log-aktivitas/insert.php");
        } else {
            $_SESSION['pesan'] = "Terjadi kesalahan saat menyimpan data: " . mysqli_error($connect);
        }
    } else {
        $_SESSION['pesan'] = "Terjadi kesalahan saat mencari id_siswa: " . mysqli_error($connect);
    }
}
