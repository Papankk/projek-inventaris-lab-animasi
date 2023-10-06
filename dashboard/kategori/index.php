<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css " rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
    <title>Tabel Kategori</title>
</head>

<body>
    <br>
    <h1 class="text-center">Tabel Kategori</h1><br><br>
    <div class="container">
        <button id="tombol" type="button" class="btn btn-sm col-1 btn-primary" data-bs-toggle="modal" data-bs-target="#insertModalLong">
            <i class="bi bi-person-plus-fill"></i> Insert
        </button>
        <br><br>
        <?php
        session_start();

        if (isset($_SESSION['pesan'])) :
        ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['pesan']; ?>
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
            session_destroy();
        endif;
        ?>

        <table id="tabel-crud" class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th class="col-1" scope="col">#</th>
                    <th class="col-9" scope="col">Kategori</th>
                    <th class="col-2" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
    </div>
</body>

</html>

<?php

include ("koneksi.php");

$no = 1;
$sql = "SELECT * FROM tbl_kategori";
$queryview = mysqli_query($db, $sql);

if (!$queryview) {
    die('Query failed: ' . mysqli_error($db));
}

while ($row = mysqli_fetch_assoc($queryview)) :
    echo "<tr>";
    echo '<td scope="row">' . $no++ . "</td>";
    echo "<td>" . $row['nama_kategori'] . "</td>";
?>
    <td>
        <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $no; ?>"><i class="bi bi-pencil-square"></i> Edit</a>
        <a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $no; ?>"><i class="bi bi-trash"></i> Delete</a>
    </td>

    </tr>

    <!-- Modal Delete -->
    <div class="modal fade" id="modaldelete<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modaldelete<?= $no; ?>LongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaldelete<?= $no; ?>">Delete</h5>
                    <button type="button" class="btn btn-danger btn-sm close" data-bs-dismiss="modal" aria-label="Close">
                        <b><span aria-hidden="true">&times;</span></b>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="contact-form" action="delete.php" method="post">

                        <p>Yakin untuk menghapus data dari ID : <?= $row['id_kategori'] ?> ?</p>
                        <input type="hidden" name="id_kategori" id="id_kategori" value="<?= $row['id_kategori'] ?>">
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
                    <h5 class="modal-title" id="modal<?= $no; ?>">Edit <?= $row['id_kategori'] ?></h5>
                    <button type="button" class="btn btn-danger btn-sm close" data-bs-dismiss="modal" aria-label="Close">
                        <b><span aria-hidden="true">&times;</span></b>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="contact-form" action="edit.php" method="post">
                        <?php
                        $id = $row['id_kategori'];
                        $query = "SELECT * FROM tbl_kategori WHERE id_kategori='$id'";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="id_kategori" id="id_kategori" value="<?= $row['id_kategori'] ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama_kategori">Kategori : </label><input class="form-control" type="text" name="nama_kategori" id="nama_kategori" value="<?= $row['nama_kategori']; ?>" required="">
                            </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button name="submit" type="submit" onclick="submitForm()" class="btn btn-primary">Save changes</button>
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
                <button type="button" class="btn btn-danger btn-sm close" data-bs-dismiss="modal" aria-label="Close">
                    <b><span aria-hidden="true">&times;</span></b>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate name="contact-form" action="insert.php" method="post">
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="id_kategori" id="id_kategori" required="">
                        <div class="invalid-feedback">
                            Harus Diisi
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_kategori">Kategori : </label><input class="form-control" type="text" name="nama_kategori" id="nama_kategori" required="">
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

    $(document).ready(function() {
        $('#tabel-crud').DataTable();
    });
</script>

</html>