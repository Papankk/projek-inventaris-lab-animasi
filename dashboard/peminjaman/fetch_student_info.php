<?php
include('../../koneksi.php');

if (isset($_POST['studentName'])) {
    $studentName = $_POST['studentName'];

    $query = "SELECT * FROM tbl_siswa WHERE nama_siswa = '$studentName'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $studentData = [
            'kelas' => $row['kelas'],
            'jurusan' => $row['jurusan'],
            'abjad' => $row['abjad'],
            'no_identitas' => $row['no_identitas'],
        ];

        echo json_encode($studentData);
    } else {
        echo json_encode(['error' => 'Nama siswa tidak ditemukan']);
    }
} else {
    echo json_encode(['error' => 'Data tidak ditemukan']);
}
