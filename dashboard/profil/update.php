<?php
session_start();
include "../../koneksi.php";

$id = $_POST['id'];
$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg');
$filename = $_FILES['image']['name'];
$ukuran = $_FILES['image']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$username = $_POST["username"];
$password1 = $_POST["pass1"];
$password2 = $_POST["pass2"];

if ($password1 == $password2) {
    $pengacak = "PsoaiS812Sp'";
    $enkripsi = md5($pengacak . md5($password1));
    $detail_query = "UPDATE tbl_user SET username = '$username', password = '$enkripsi' WHERE id_user = $id";
    mysqli_query($connect, $detail_query);


    if (file_exists($_FILES['image']['tmp_name'])) {

        if (!in_array($ext, $ekstensi)) {
            $_SESSION['color'] = "danger";
            $_SESSION['title'] = "Gagal!";
            $_SESSION['text'] = "Format file harus PNG, JPG, atau JPEG!";
            header("location: ../profil");
        } else {
            if ($ukuran < 1044070) {
                $user = $_SESSION['username'];
                $selectquery = mysqli_query($connect, "SELECT * FROM tbl_user WHERE username = '$user'");
                $data = mysqli_fetch_assoc($selectquery);

                if ($data['foto_profil'] != "default.png") {
                    unlink('../../assets/img/' . $data['foto_profil']);
                }

                $xx = $rand . '_' . $filename;
                move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/img/' . $rand . '_' . $filename);
                $update_query = "UPDATE tbl_user SET foto_profil = '$xx' WHERE id_user = $id";
                $hasil = mysqli_query($connect, $update_query);
                $_SESSION['color'] = "success";
                $_SESSION['title'] = "Sukses!";
                $_SESSION['text'] = "Berhasil Edit Profil!";
                $_SESSION['username'] = $username;

                $_SESSION['aktivitas'] = "Edit Profil <b>$username</b>";
                date_default_timezone_set("Asia/Jakarta");
                $_SESSION['waktu'] = date("Y-F-d H:i:s");
                $_SESSION['location'] = "profil/";

                header("location: ../log-aktivitas/insert.php");
            } else {
                $_SESSION['color'] = "danger";
                $_SESSION['title'] = "Error!";
                $_SESSION['text'] = "Ukuran file maksimal 1 MB!";
                header("location: ../profil");
            }
        }
    } else {
        $_SESSION['color'] = "success";
        $_SESSION['title'] = "Sukses!";
        $_SESSION['text'] = "Berhasil Edit Profil!";
        $_SESSION['username'] = $username;

        $_SESSION['aktivitas'] = "Edit Profil <b>$username</b>";
        date_default_timezone_set("Asia/Jakarta");
        $_SESSION['waktu'] = date("Y-F-d H:i:s");
        $_SESSION['location'] = "profil/";

        header("location: ../log-aktivitas/insert.php");
    }
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['title'] = "Error!";
    $_SESSION['text'] = "Password yang dimasukkan tidak sama";
    header("location: ../profil");
}
