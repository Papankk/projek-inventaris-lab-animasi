<?php
$no = 1;
include "../../koneksi.php";
session_start();
$username = $_SESSION['username'];
$result = mysqli_query($connect, "SELECT * FROM tbl_user WHERE username = '$username'");
$data = mysqli_fetch_assoc($result);

if ($data['role'] == "0") {
    header("location: ../../404.html");
}

if ($_SESSION['logged_in']) {
?>
    <html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../sneat/assets/" data-template="vertical-menu-template-free">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Dashboard - Manage Siswa</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="../sneat/assets/vendor/fonts/boxicons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="../sneat/assets/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="../sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="../sneat/assets/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="../sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <link rel="stylesheet" href="../sneat/assets/vendor/libs/apex-charts/apex-charts.css" />

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="../sneat/assets/vendor/js/helpers.js"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="../sneat/assets/js/config.js"></script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->

                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                    <div class="app-brand demo">
                        <a href="../" class="app-brand-link">
                            <span class="app-brand-text menu-text fw-bolder">Inventaris Lab Animasi</span>
                        </a>

                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                            <i class="bx bx-chevron-left bx-sm align-middle"></i>
                        </a>
                    </div>

                    <ul class="menu-inner py-1">
                        <!-- Dashboard -->
                        <li class="mt-3 menu-item">
                            <a href="../" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Dashboard</div>
                            </a>
                        </li>

                        <li class="menu-header small text-uppercase">
                            <span class="menu-header-text">Data Barang</span>
                        </li>
                        <li class="menu-item">
                            <a href="../barang/" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-package"></i>
                                <div data-i18n="Basic">Barang</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="../peminjaman/" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-transfer-alt"></i>
                                <div data-i18n="Basic">Peminjaman</div>
                            </a>
                        </li>
                        <?php
                        if ($data['role'] == "1") {
                        ?>
                            <li class="menu-item">
                                <a href="../pengajuan/" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-chevrons-right"></i>
                                    <div data-i18n="Basic">Pengajuan</div>
                                </a>
                            </li>
                            <li class="menu-header small text-uppercase"><span class="menu-header-text">Aktivitas</span></li>
                            <li class="menu-item">
                                <a href="../log-aktivitas/" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-shuffle"></i>
                                    <div data-i18n="Basic">Log Aktivitas</div>
                                </a>
                            </li>
                            <li class="menu-header small text-uppercase"><span class="menu-header-text">SISWA</span></li>
                            <li class="menu-item active">
                                <a href="#" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-user"></i>
                                    <div data-i18n="Basic">Manage Siswa</div>
                                </a>
                            </li>
                            <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin</span></li>
                            <li class="menu-item">
                                <a href="../admin/" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                    <div data-i18n="Basic">Manage Admin</div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </aside>
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->

                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item d-flex align-items-center">
                                    Menu Admin
                                </div>
                            </div>
                            <!-- /Search -->

                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <!-- Place this tag where you want the button to render. -->

                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="../../assets/img/<?php echo $data['foto_profil'] ?>" alt class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">
                                                            <img src="../../assets/img/<?php echo $data['foto_profil'] ?>" alt class="w-px-40 h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span class="fw-semibold d-block"><?= $_SESSION['username'] ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="../profil/">
                                                <i class="bx bx-user me-2"></i>
                                                <span class="align-middle">Edit Profile</span>
                                            </a>
                                        </li>
                                        <?php
                                        if ($data['role'] == "1") {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="../master-setting/">
                                                    <i class="bx bx-cog me-2"></i>
                                                    <span class="align-middle">Master Setting</span>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                        <li>
                                            <a class="dropdown-item" href="../../logout.php">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        </div>
                    </nav>

                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
                                <div class="col-lg mb-4 order-0">
                                    <button id="tombol" type="button" class="mb-4 btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#insertModalLong">
                                        <i class="bx bx-plus"></i> Insert
                                    </button>

                                    <?php
                                    if (isset($_SESSION['text'])) :
                                    ?>
                                        <div class="alert alert-<?= $_SESSION['color'] ?> alert-dismissible" role="alert">
                                            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1"><?= $_SESSION['title'] ?></h6>
                                            <p class="mb-0"><?= $_SESSION['text'] ?></p>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                window.setTimeout(function() {
                                                    $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                                                        $(this).remove();
                                                    });
                                                }, 3000);

                                            });
                                        </script>
                                    <?php
                                        unset($_SESSION['color']);
                                        unset($_SESSION['title']);
                                        unset($_SESSION['text']);
                                    endif;

                                    ?>

                                    <div class="card">
                                        <div class="p-3 table-responsive">
                                            <table id="tabel-crud" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="col-1" scope="col">#</th>
                                                        <th class="col-4" scope="col">Nama</th>
                                                        <th class="col-2" scope="col">Kelas</th>
                                                        <th class="col-2" scope="col">No.Identitas</th>
                                                        <th class="col-2" scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = "SELECT * FROM tbl_siswa";
                                                    $queryview = mysqli_query($connect, $sql);

                                                    if (!$queryview) {
                                                        die('Query failed: ' . mysqli_error($connect));
                                                    }

                                                    while ($row = mysqli_fetch_assoc($queryview)) :
                                                        echo "<tr>";
                                                        echo '<td scope="row">' . $no++ . "</td>";
                                                        echo "<td>" . $row['nama_siswa'] . "</td>";
                                                        echo "<td>" . $row['kelas'] . "\n" .  $row['jurusan'] . "\n" . $row['abjad'] . "</td>";
                                                        echo "<td>" . $row['no_identitas'] . "</td>";
                                                    ?>
                                                        <td>
                                                            <div class="d-grid gap-2 col-5">
                                                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $no; ?>"><i class="bi bi-pencil-square"></i> Edit</a>
                                                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $no; ?>"><i class="bi bi-trash"></i> Delete</a>
                                                            </div>
                                                        </td>
                                                        </tr>

                                                        <!-- Modal Delete -->
                                                        <div class="modal fade" id="modaldelete<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modaldelete<?= $no; ?>LongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modaldelete<?= $no; ?>">Delete</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form name="contact-form" action="delete.php" method="post">

                                                                            <p>Yakin untuk menghapus data dari Nama : <?= $row['nama_siswa'] ?> ?</p>
                                                                            <input type="hidden" name="id_siswa" id="id_siswa" value="<?= $row['id_siswa'] ?>">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button name="submitinsert" type="submit" onclick="submitForm()" class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- Modal Edit -->
                                                        <div class="modal fade" id="modal<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?= $no; ?>LongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modal<?= $no; ?>">Edit <?= $row['nama_siswa'] ?></h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form name="edit-form" action="edit.php" method="post">
                                                                            <?php
                                                                            $id = $row['id_siswa'];
                                                                            $query_edit = "SELECT * FROM tbl_siswa WHERE id_siswa='$id'";
                                                                            $result = mysqli_query($connect, $query_edit);
                                                                            while ($row_edit = mysqli_fetch_assoc($result)) {
                                                                            ?>
                                                                                <div class="form-group">
                                                                                    <input class="form-control" type="hidden" name="id_siswa" id="edit-id_siswa" value="<?= $row['id_siswa'] ?>" required="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="edit-nama_siswa">Nama : </label>
                                                                                    <input class="form-control" type="text" name="nama_siswa" id="edit-nama_siswa" value="<?= $row['nama_siswa']; ?>" required="">
                                                                                </div><br>
                                                                                <div class="form-group">
                                                                                    <label for="edit-kelas">Kelas:</label>
                                                                                    <select class="form-select" name="kelas" id="edit-kelas" required="">
                                                                                        <option value="X" <?= ($row['kelas'] == 'X') ? 'selected' : ''; ?>>X</option>
                                                                                        <option value="XI" <?= ($row['kelas'] == 'XI') ? 'selected' : ''; ?>>XI</option>
                                                                                        <option value="XII" <?= ($row['kelas'] == 'XII') ? 'selected' : ''; ?>>XII</option>
                                                                                    </select>
                                                                                </div><br>
                                                                                <div class="form-group">
                                                                                    <label for="edit-jurusan">Jurusan:</label>
                                                                                    <select class="form-select" name="jurusan" id="edit-jurusan" required="">
                                                                                        <option value="Animasi" <?= ($row['jurusan'] == 'Animasi') ? 'selected' : ''; ?>>Animasi</option>
                                                                                        <option value="DKV" <?= ($row['jurusan'] == 'DKV') ? 'selected' : ''; ?>>DKV</option>
                                                                                        <option value="Teknik Grafika" <?= ($row['jurusan'] == 'Teknik Grafika') ? 'selected' : ''; ?>>Teknik Grafika</option>
                                                                                        <option value="Mekatronika" <?= ($row['jurusan'] == 'Mekatronika') ? 'selected' : ''; ?>>Mekatronika</option>
                                                                                        <option value="Perhotelan" <?= ($row['jurusan'] == 'Perhotelan') ? 'selected' : ''; ?>>Perhotelan</option>
                                                                                        <option value="RPL" <?= ($row['jurusan'] == 'RPL') ? 'selected' : ''; ?>>RPL</option>
                                                                                        <option value="TKJ" <?= ($row['jurusan'] == 'TKJ') ? 'selected' : ''; ?>>TKJ</option>
                                                                                    </select>
                                                                                </div><br>
                                                                                <div class="form-group">
                                                                                    <label for="edit-abjad">Abjad:</label>
                                                                                    <select class="form-select" name="abjad" id="edit-abjad" required="">
                                                                                        <option value="A" <?= ($row['abjad'] == 'A') ? 'selected' : ''; ?>>A</option>
                                                                                        <option value="B" <?= ($row['abjad'] == 'B') ? 'selected' : ''; ?>>B</option>
                                                                                        <option value="C" <?= ($row['abjad'] == 'C') ? 'selected' : ''; ?>>C</option>
                                                                                    </select>
                                                                                </div><br>
                                                                                <div class="form-group">
                                                                                    <label for="edit-no_identitas">No.Identitas : </label>
                                                                                    <input class="form-control" type="text" name="no_identitas" id="edit-no_identitas" value="<?= $row['no_identitas']; ?>" required="">
                                                                                </div><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button name="submit" type="submit" onclick="submitEditForm()" class="btn btn-primary">Save changes</button>
                                                                        </form>
                                                                    </div>
                                                                <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endwhile ?>
                                            </table>

                                            <!-- Modal Insert -->
                                            <div class="modal fade" id="insertModalLong" tabindex="-1" role="dialog" aria-labelledby="insertModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="insertModalLongTitle">Insert</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="needs-validation" novalidate name="contact-form" action="insert.php" method="post">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="hidden" name="id_siswa" id="id_siswa" required="">
                                                                    <div class="invalid-feedback">
                                                                        Harus Diisi
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_siswa">Siswa : </label>
                                                                    <input class="form-control" type="text" name="nama_siswa" id="nama_siswa" required="">
                                                                    <div class="invalid-feedback">
                                                                        Harus Diisi
                                                                    </div>
                                                                </div><br>
                                                                <div class="form-group">
                                                                    <label for="kelas">Kelas:</label>
                                                                    <select class="form-select" name="kelas" id="kelas" required="">
                                                                        <option value="" disabled selected hidden>--PILIH KELAS--</option>
                                                                        <option value="X">X</option>
                                                                        <option value="XI">XI</option>
                                                                        <option value="XII">XII</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Harus Diisi
                                                                    </div>
                                                                </div><br>
                                                                <div class="form-group">
                                                                    <label for="jurusan">Jurusan:</label>
                                                                    <select class="form-select" name="jurusan" id="jurusan" required="">
                                                                        <option value="" disabled selected hidden>--PILIH JURUSAN--</option>
                                                                        <option value="Animasi">Animasi</option>
                                                                        <option value="DKV">DKV</option>
                                                                        <option value="Teknik Grafika">Teknik Grafika</option>
                                                                        <option value="Mekatronika">Mekatronika</option>
                                                                        <option value="Perhotelan">Perhotelan</option>
                                                                        <option value="RPL">RPL</option>
                                                                        <option value="TKJ">TKJ</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Harus Diisi
                                                                    </div>
                                                                </div><br>
                                                                <div class="form-group">
                                                                    <label for="abjad">Abjad:</label>
                                                                    <select class="form-select" name="abjad" id="abjad" required="">
                                                                        <option value="" disabled selected hidden>--PILIH ABJAD--</option>
                                                                        <option value="A">A</option>
                                                                        <option value="B">B</option>
                                                                        <option value="C">C</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Harus Diisi
                                                                    </div>
                                                                </div><br>
                                                                <div class="form-group">
                                                                    <label for="no_identitas">No.Identitas : </label>
                                                                    <input class="form-control" type="text" name="no_identitas" id="no_identitas" required="">
                                                                    <div class="invalid-feedback">
                                                                        Harus Diisi
                                                                    </div>
                                                                </div><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button name="submitinsert" type="submit" class="btn btn-primary">Insert</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                let forms = document.querySelectorAll(".needs-validation");

                                                Array.prototype.slice.call(forms).forEach(function(form) {
                                                    form.addEventListener("submit", function(event) {
                                                        if (!form.checkValidity()) {
                                                            event.preventDefault();
                                                            event.stopPropagation();
                                                        }
                                                        form.classList.add("was-validated");
                                                    });
                                                });

                                                new DataTable('#tabel-crud', {
                                                    responsive: true,
                                                    rowReorder: {
                                                        selector: 'td:nth-child(2)'
                                                    }
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- / Content -->


                        <!-- Modal Insert -->
                        <div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="modalInsertLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalInsertLabel">Tambah Admin</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="insert.php" enctype="multipart/form-data">
                                            <label class="form-label">Username</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text cursor-pointer"><i class="bx bx-user"></i></span>
                                                <input type="text" name="username" class="form-control" placeholder="Username" required />
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text cursor-pointer"><i class="bx bx-key"></i></span>
                                                        <input type="password" name="pass1" class="form-control" id="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password" required />
                                                        <span class="input-group-text" onclick="password_show_hide();">
                                                            <i class="bx bx-hide d-none" id="hide"></i>
                                                            <i class="bx bx-show" id="show"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label class="form-label">Konfirmasi Password</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text cursor-pointer"><i class="bx bx-key"></i></span>
                                                        <input type="password" name="pass2" class="form-control" id="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password" required />
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button name="submit" type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- / Modal Insert -->
                    </div>

                    <script>
                        function password_show_hide() {
                            var x = document.getElementById("password");
                            var show = document.getElementById("show");
                            var hide = document.getElementById("hide");
                            hide.classList.remove("d-none");
                            if (x.type === "password") {
                                x.type = "text";
                                show.style.display = "none";
                                hide.style.display = "block";
                            } else {
                                x.type = "password";
                                show.style.display = "block";
                                hide.style.display = "none";
                            }
                        }
                    </script>

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © Powered By <b>Sneat</b>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="../sneat/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../sneat/assets/vendor/libs/popper/popper.js"></script>
        <script src="../sneat/assets/vendor/js/bootstrap.js"></script>
        <script src="../sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="../sneat/assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="../sneat/assets/vendor/libs/apex-charts/apexcharts.js"></script>

        <!-- Main JS -->
        <script src="../sneat/assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="../sneat/assets/js/dashboards-analytics.js"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>

    </body>

    </html>
<?php
} else {
    header("location: ../");
}
