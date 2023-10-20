<?php
include "../../koneksi.php";

$query_barang = mysqli_query($connect, "SELECT nama_barang FROM tbl_barang");
$fetch = mysqli_fetch_assoc($query_barang);
$nama_barang = $fetch['nama_barang'];

$explode = explode("-", $nama_barang);
$nama_barang = $explode[0];

$query_barang1 = mysqli_query($connect, "SELECT nama_barang FROM tbl_barang WHERE nama_barang LIKE '$nama_barang%' ORDER BY id_barang DESC LIMIT 1");
$fetch1 = mysqli_fetch_assoc($query_barang1);
$nama_barang1 = $fetch1['nama_barang'];

$explode1 = explode("-", $nama_barang1);
$angka = $explode1[1];

echo $angka;
