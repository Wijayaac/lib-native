<?php
require_once '../templates/navbar.php';
include '../db/connection.php';
require_once './request/get-all.php';
?>
<div class="container-fluid" style="min-height: 80vh; max-width: 720px;">
    <h2 class="text-center h2 my-2 my-md-4">Data Peminjaman</h2>
    <div class="row mx-auto mt-2 mt-md-4 py-2 py-md-4">
        <div class="col">
            <div class="btn btn-success mb-2 mb-md-4">
                <a class="text-decoration-none text-white d-flex align-items-center" href="./request/print.php" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer mx-1" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                    </svg> Cetak Data
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Buku</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal</th>
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
                            <td><?= $pinjam['status'] == 0 ? 'Dikembalikan' : 'Dipinjam' ?></td>
                            <td><?= $pinjam['date'] ?></td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once '../templates/bottom.php';
?>