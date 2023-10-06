<?php
    session_start();

    include 'koneksi.php';
    
    $id_kategori = $_POST['id_kategori'];
    
    $queryupdate = mysqli_query($db, "DELETE FROM tbl_kategori WHERE id_kategori='$id_kategori'");
    
    if ($queryupdate) {
        $_SESSION['pesan'] = "Data berhasil dihapus!";
        header("location: index.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }
?>