<?php
include '../../db/connection.php';
$id = $_GET['id'];

$query = "SELECT nama,jk,alamat,status,foto FROM tbl_anggota WHERE id = '$id'";
$result = mysqli_query($connection, $query);
if ($result) {
    $data = mysqli_fetch_assoc($result);
    mysqli_close($connection);
} else {
    $connection->error;
}

require_once('../../templates/navbar.php')
?>
<div class="container py-2 py-md-5 mt-2 mt-md-4" style="max-width: 720px; min-height: 70vh;">
    <h4 class="text-secondary text-center mb-2 mb-md-4">Ubah Data Anggota</h4>

    <form action="../request/update.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">

            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="exampleInputId1" class="form-label">Nama</label>
            <input type="text" value="<?= $data['nama'] ?>" name="nama" class="form-control" id="exampleInputId1">
        </div>
        <div class="mb-3">
            <label for="exampleInputId1" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jk" aria-label="Default select example">
                <option>Pilih Salah Satu</option>
                <?php if ($data['jk'] == 0)  echo '
            <option value="0" selected >Perempuan</option>
            <option value="1">Laki - Laki</option>' ?>
                <?php if ($data['jk'] == 1)  echo '
            <option value="1" selected >Laki Laki</option>
            <option value="0">Perempuan</option>' ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputId1" class="form-label">Alamat</label>
            <textarea class="form-control" value="" name="alamat" id="exampleFormControlTextarea1" rows="3"><?= $data['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
            <?php if ($data['status'] == 1)  echo '
        <div class="form-check">
            <input class="form-check-input" checked type="radio" name="status" id="flexRadioDefault1" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Aktif
            </label>
            </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0">
            <label class="form-check-label" for="flexRadioDefault2">
                Tidak Aktif
            </label>
        </div>' ?>
            <?php if ($data['status'] == 0)  echo '
        <div class="form-check">
            <input class="form-check-input"  type="radio" name="status" id="flexRadioDefault1" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Aktif
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" checked type="radio" name="status" id="flexRadioDefault2" value="0">
            <label class="form-check-label" for="flexRadioDefault2">
                Tidak Aktif
            </label>
        </div>' ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputId1" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="exampleInputId1">
            <span>Gambar sebelumnya : <?= $data['foto'] ?></span>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
require_once('../../templates/bottom.php');
