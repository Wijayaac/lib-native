<?php
require_once '../templates/navbar.php';
include '../db/connection.php';
require_once './request/get-all.php';
?>
<div class="container-fluid" style="min-height: 80vh; max-width: 720px;">
    <h2 class="text-center h2 my-2 my-md-4">Master Buku</h2>
    <div class="btn btn-primary mb-2 mb-md-4">
        <a class="text-decoration-none text-white d-flex align-items-center" href="./request/add.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square mx-1" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg> Tambah Buku
        </a>
    </div>
    <div class="btn btn-success mb-2 mb-md-4">
        <a class="text-decoration-none text-white d-flex align-items-center" href="./request/print.php" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer mx-1" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
            </svg> Cetak Data
        </a>
    </div>
    <div class="row mx-auto mt-2 mt-md-4 py-2 py-md-4">
        <div class="col">
            <table class="table table-striped table-bordered dt-responsive nowrap" id='bookTable'>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = getBooks($connection);
                    while ($book = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?= $book['id'] ?></th>
                            <td><?= $book['judul'] ?></td>
                            <td><?= $book['penulis'] ?></td>
                            <td><?= $book['penerbit'] ?></td>
                            <td>
                                <a href="<?= './request/edit.php?id=' . $book['id'] ?>" class="btn btn-info d-inline-block mx-1 my-1">Edit</a>
                                <a href="<?= './request/delete.php?id=' . $book['id'] ?>" class="btn btn-danger d-inline-block mx-1 my-1">Delete</a>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#bookTable').DataTable();
    });
</script>
<?php
require_once '../templates/bottom.php';
?>