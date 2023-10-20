<?php
session_start();
include "../../koneksi.php";

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

$query_ttd = mysqli_query($connect, "SELECT * FROM tbl_setting");
$fetch = mysqli_fetch_assoc($query_ttd);

//Mengaktifkan output buffering
ob_start();
?>

<html lang="en">

<head>
    <title>Cetak Pengajuan</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="font-family: Arial, Helvetica, sans-serif">
    <table class="table1">
        <tr>
            <div class="div1">
                <img src="data:image/png;base64,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" alt="asdasd" style="width: 70px; margin-left: 30px" />
            </div>
            <th class="th1">PEMERINTAH PROVINSI JAWA TIMUR</th>
        </tr>
        <tr>
            <th class="th1">DINAS PENDIDIKAN</th>
        </tr>
        <tr>
            <th class="th2" style="font-size: 16px">SMK NEGERI 4 MALANG</th>
        </tr>
        <tr>
            <td class="td1">
                Jl. Tanimbar 22 Malang 65117 Telp./Fax : (0341) 353798 / (0341) 363099
            </td>
        </tr>
        <tr>
            <td class="td1">
                <a href="">www.smkn4malang.sch.id</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">e-mail : mail@smkn4malang.sch.id</a>
            </td>
        </tr>
    </table>
    <hr />
    <div>
        <h3 style="text-align: center">
            Data Distribusi Bahan
        </h3>
    </div>
    <div>
        <table style="font-size: 12px; margin-left: 50px">
            <tr>
                <td>Jurusan / Bagian</td>
                <td>:</td>
                <td>Animasi</td>
            </tr>
        </table>
    </div>
    <div>
        <table class="nodok" style="font-size: 12px">
            <thead>
                <tr style="padding-top: 5px; padding-bottom: 5px;" class="nodok">
                    <th class="nodok">No.</th>
                    <th class="nodok" style="width: 15%;">Nama Pengambil</th>
                    <th class="nodok" style="width: 12%;">Jabatan</th>
                    <th class="nodok" style="width: 17%;">Nama Bahan</th>
                    <th class="nodok">Jumlah</th>
                    <th class="nodok">Satuan</th>
                    <th class="nodok">Tanggal Pengambilan</th>
                    <th class="nodok" style="width: 20%;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query_select = mysqli_query($connect, "SELECT * FROM tbl_distribusi");
                while ($row = mysqli_fetch_assoc($query_select)) {
                ?>
                    <tr class="nodok">
                        <td style="text-align: center" class="nodok"><?= $no++ ?></td>
                        <td class="nodok"><?= $row['nama_pengambil'] ?></td>
                        <td class="nodok"><?= $row['jabatan'] ?></td>
                        <td style="" class="nodok"><?= $row['nama_bahan'] ?></td>
                        <td style="text-align: center" class="nodok"><?= $row['jumlah'] ?></td>
                        <td style="text-align: center" class="nodok"><?= $row['satuan'] ?></td>
                        <td class="nodok"><?= $row['tgl_pengambilan'] ?></td>
                        <td class="nodok"><?= $row['keterangan'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div style="font-size: 13px; margin-left: 28px; position: absolute">
        <p>Malang,<br />Kepala Bengkel</p>
        <br /><br /><br />
        <b><u><?= $fetch['nama_kabeng'] ?></u></b><br />
        NIP. <?= $fetch['nip_kabeng'] ?>
    </div>
</body>
<style>
    html {
        font-family: Arial;
    }

    .table1 {
        margin-left: auto;
        margin-right: auto
    }

    .div1 {
        position: absolute;
    }

    .th1 {
        font-size: 14px;
    }

    .th2 {
        font-size: 16px;
    }

    .td1 {
        font-size: 12px;
        text-align: center
    }

    hr {
        height: 2 px;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    .div2 {
        display: block;
    }

    .table2 {
        font-size: 13px;
        float: right
    }

    .nodok {
        padding: 12px;
        border: 1px solid black;
        border-collapse: collapse;
    }

    h3 {
        text-align: center;
    }

    .table3 {
        font-size: 14px;
        margin-left: 80px
    }

    thead {
        padding: 20px;
        background-color: #c0c0c0;
    }
</style>

</html>

<?php

//Meload library mPDF
require '../../vendor/autoload.php';

//Membuat inisialisasi objek mPDF
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'margin_top' => 10, 'margin_bottom' => 10, 'margin_left' => 10, 'margin_right' => 10]);

//Memasukkan output yang diambil dari output buffering ke variabel html
$html = ob_get_contents();

//Menghapus isi output buffering
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->SetTitle("Cetak Pengajuan");

//Membuat output file
$content = $mpdf->Output("", "I");

?>