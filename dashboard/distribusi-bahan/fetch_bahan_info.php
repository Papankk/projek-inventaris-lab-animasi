<?php
include('../../koneksi.php');

if (isset($_POST['studentName'])) {
    $studentName = $_POST['studentName'];

    $query = "SELECT * FROM tbl_bahan WHERE nama = '$studentName'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $studentData = [
            'jumlah' => $row['jumlah'],
            'satuan' => $row['satuan'],
            'tanggal' => $row['tanggal'],
            'asal_bahan' => $row['asal_bahan'],
            'keterangan' => $row['keterangan'],
        ];

        echo json_encode($studentData);
    } else {
        echo json_encode(['error' => 'Nama siswa tidak ditemukan']);
    }
} else {
    echo json_encode(['error' => 'Data tidak ditemukan']);
}
