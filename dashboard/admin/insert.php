<?php
session_start();
include "../../koneksi.php";

$username = $_POST["username"];
$password1 = $_POST["pass1"];
$password2 = $_POST["pass2"];
$role = $_POST['role'];

$query = "SELECT * FROM tbl_user WHERE username = '$username'";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['color'] = "danger";
    $_SESSION['title'] = "Error!";
    $_SESSION['text'] = "Username / Password sudah ada!";
    header("location: ../admin");
} else {
    if ($password1 == $password2) {
        $pengacak = "PsoaiS812Sp'";
        $enkripsi = md5($pengacak . md5($password1));
        $insert_query = "INSERT INTO tbl_user (id_user, role, username, password) VALUES('' ,'$role', '$username', '$enkripsi')";
        $hasil = mysqli_query($connect, $insert_query);

        if ($hasil) {
            $_SESSION['color'] = "success";
            $_SESSION['title'] = "Sukses!";
            $_SESSION['text'] = "Berhasil Registrasi!";

            $_SESSION['aktivitas'] = "Input Admin <b>$username</b>";
            date_default_timezone_set("Asia/Jakarta");
            $_SESSION['waktu'] = date("Y-F-d H:i:s");
            $_SESSION['location'] = "admin/";

            header("location: ../log-aktivitas/insert.php");
        } else {
            $_SESSION['color'] = "danger";
            $_SESSION['title'] = "Error!";
            $_SESSION['text'] = "Terjadi kesalahan saat registrasi!";
            header("location: ../admin");
        }
    } else {
        $_SESSION['color'] = "danger";
        $_SESSION['title'] = "Error!";
        $_SESSION['text'] = "Password yang dimasukkan tidak sama";
        header("location: ../admin");
    }
}
