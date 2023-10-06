<?php
// Pastikan Anda memiliki koneksi database yang sudah diatur
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $peminjaman_id = $_POST['peminjaman_id'];
    $new_status = $_POST['new_status'];
    $update_kondisi_sesudah = $_POST['update_kondisi_sesudah'];

    // Perbarui status peminjaman
    $query = "UPDATE tbl_peminjaman SET status_peminjaman = '$new_status' WHERE id_peminjaman = $peminjaman_id";

    if (mysqli_query($connect, $query)) {
        // Jika pembaruan berhasil, tambahkan kode untuk memperbarui kondisi sesudah
        // Contoh:
        $queryUpdateKondisi = "UPDATE tbl_peminjaman SET kondisi_sesudah = '$update_kondisi_sesudah' WHERE id_peminjaman = $peminjaman_id";
        mysqli_query($connect, $queryUpdateKondisi);

        echo "success"; // Berhasil
    } else {
        echo "error"; // Gagal
    }
} else {
    echo "Metode permintaan tidak valid.";
}
