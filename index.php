<html>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
</head>

<?php
session_start();

error_reporting(0);
include "koneksi.php";
if (isset($_SESSION['logged_in'])) {
    header("location: dashboard/");
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];

    if (empty($username) || empty($password)) {
        $_SESSION['required'] = "Username / Password harus diisi!";
    } else {
        $query = "SELECT * FROM tbl_user WHERE username = '$username'";
        $hasil = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($hasil);

        $pengacak = "PsoaiS812Sp'";
        $enkripsi = md5($pengacak . md5($password));

        if ($enkripsi == $data['password']) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['logged_in'] = "Login Sukses!";
            header("location: dashboard/");
        } else {
            $_SESSION['required'] = "Username / Password salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<body style="font-family: Public Sans;" class="bg-light">
    <div class="container">
        <h1 class="text-center mt-5 b-3 fw-bolder">Inventaris Lab Animasi</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 my-5">
                <div style="border-radius: 10px;" class="card p-5 shadow">
                    <div class="text-center">
                        <h2>Login</h2>
                    </div>
                    <hr class="my-4 border-2">
                    <form method="post" action="">
                        <div class="col input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input name="username" type="text" value="" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required />
                        </div>
                        <div class="col input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input name="pass" type="password" value="" class="input form-control" id="password" placeholder="Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="password_show_hide();">
                                    <i class="fas fa-eye" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                        <hr class="my-4 border-2">
                        <button style="background-color: #696cff;" name="submit" type="submit" class="btn btn-sm btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($_SESSION['required']) {
    ?>

        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $_SESSION['required'] ?>'
            })
        </script>

    <?php
        unset($_SESSION['required']);
    }
    ?>
</body>
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>

</html>