<?php
include '../../db/connection.php';

$id = $_GET['id'];

$query = "SELECT tbl_peminjaman.id,tbl_peminjaman.created_at AS date,tbl_peminjaman.status, tbl_anggota.nama,tbl_anggota.id AS idAnggota, tbl_buku.judul AS buku,tbl_buku.id AS idBuku FROM `tbl_peminjaman` LEFT JOIN `tbl_buku` ON tbl_buku.id = tbl_peminjaman.id_buku LEFT JOIN `tbl_anggota` ON tbl_anggota.id = tbl_peminjaman.id_ang WHERE tbl_peminjaman.id = '$id'";

$result = mysqli_query($connection, $query);
$data = mysqli_fetch_assoc($result);
mysqli_close($connection);

?>
<form action="../request/update.php" method="POST">
    <div class="mb-3">
        <label for="exampleDataList" class="form-label">Datalist Members</label>
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <input type="hidden" name="idMember" value="<?= $data['idAnggota'] ?>">
        <input type="hidden" name="idBook" value="<?= $data['idBuku'] ?>">
        <input disabled type="text" class="form-control" name="anggota" value="<?= $data['nama'] ?>" >
        
    </div>
    <div class="mb-3">
        <label for="exampleDataList" class="form-label">Datalist Books</label>
        <input disabled type="text" class="form-control" name="buku" value="<?= $data['buku'] ?>" >
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Dikembalikan</button>
</form>