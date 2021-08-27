<?php

include_once '../../db/connection.php';
$id = $_GET['id'];
$query = "SELECT id,judul,penulis,penerbit,tahun FROM tbl_buku WHERE id = '$id'";
$result = mysqli_query($connection, $query);
if ($result) {
  # code...
  $data = mysqli_fetch_assoc($result);
  mysqli_close($connection);
} else {
  $connection->error;
}

require_once('../../templates/navbar.php');
?>
<div class="container py-2 py-md-5 mt-1 mt-md-4" style="max-width: 720px; min-height: 70vh;">
  <h4 class="text-secondary text-center mb-2 mb-md-4">Ubah Data Buku</h4>
  <form action="../request/update.php" method="POST">
    <div class="mb-3">
      <label for="exampleInputId1" class="form-label">ISBN</label>
      <input type="number" value="<?= $data['id'] ?>" name="id" class="form-control" id="exampleInputId1">
    </div>
    <div class="mb-3">
      <label for="exampleInputId1" class="form-label">Judul</label>
      <input type="text" value="<?= $data['judul'] ?>" name="judul" class="form-control" id="exampleInputId1">
    </div>
    <div class="mb-3">
      <label for="exampleInputId1" class="form-label">Penulis</label>
      <input type="text" value="<?= $data['penulis'] ?>" name="penulis" class="form-control" id="exampleInputId1">
    </div>
    <div class="mb-3">
      <label for="exampleInputId1" class="form-label">Penerbit</label>
      <input type="text" value="<?= $data['penerbit'] ?>" name="penerbit" class="form-control" id="exampleInputId1">
    </div>
    <div class="mb-3">
      <label for="exampleInputId1" class="form-label">Tahun</label>
      <input type="number" value="<?= $data['tahun'] ?>" name="tahun" class="form-control" id="exampleInputId1">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
<?php
require_once('../../templates/bottom.php');
