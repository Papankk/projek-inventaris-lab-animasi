<?php
include("../../koneksi.php");

if (isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];

    // Gantilah ini dengan kueri SQL yang sesuai untuk mengambil kondisi dari tabel tbl_barang
    $query = mysqli_query($connect, "SELECT kondisi_sebelum FROM tbl_barang WHERE id_barang = $id_barang");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        echo $data['kondisi_sebelum'];
    } else {
        echo "Kondisi tidak ditemukan";
    }
} else {
    echo "ID barang tidak ditemukan";
}
