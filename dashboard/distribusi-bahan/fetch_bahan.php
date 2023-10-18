<?php
// Sertakan file koneksi ke database
include("../../koneksi.php");

// Kueri SQL untuk mengambil nama siswa
$query = "SELECT DISTINCT nama FROM tbl_bahan";

// Eksekusi kueri
$result = mysqli_query($connect, $query);

// Cek jika kueri berhasil
if ($result) {
    $studentNames = array(); // Membuat array untuk menyimpan nama siswa

    // Loop melalui hasil kueri dan tambahkan nama siswa ke dalam array
    while ($row = mysqli_fetch_assoc($result)) {
        $studentNames[] = $row['nama'];
    }

    // Mengembalikan array nama siswa dalam format JSON
    echo json_encode($studentNames);
} else {
    // Jika kueri gagal, kembalikan pesan kesalahan
    echo json_encode(array('error' => 'Gagal mengambil data siswa.'));
}

// Tutup koneksi database
mysqli_close($connect);
