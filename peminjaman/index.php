<?php
require_once '../templates/navbar.php';
include '../db/connection.php';
require_once './request/get-all.php';
?>
<div class="content-wrapper">
    <div class="container-fluid" style="min-height: 80vh; max-width: 720px;">
        <h2 class="text-center h2 my-2 my-md-4">Data Peminjaman</h2>
        <div class="row mx-auto mt-2 mt-md-4 py-2 py-md-4">
            <div class="col">
                <div class="btn btn-primary mb-2 mb-md-4">
                    <a class="text-decoration-none text-white d-flex align-items-center" href="./request/add.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square mx-1" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg> Tambah Peminjaman
                    </a>
                </div>
                <table class="table table-striped table-bordered dt-responsive wrap" id="loanTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Buku</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = getMembers($connection);
                        while ($pinjam = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <th scope="row"><?= $pinjam['id'] ?></th>
                                <td><?= $pinjam['nama'] ?></td>
                                <td><?= $pinjam['buku'] ?></td>
                                <td><?= $pinjam['date'] ?></td>
                                <td>
                                    <a href="<?= './request/edit.php?id=' . $pinjam['id'] ?>" class="btn btn-info">Kembalikan</a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#loanTable').DataTable();
    });
</script>
<?php
require_once '../templates/bottom.php';
?>