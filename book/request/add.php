<?php
require_once('../../templates/navbar.php');
?>
<div class="container py-2 py-md-5 mt-1 mt-md-4" style="max-width: 720px; min-height: 70vh;">
  <h4 class="text-secondary text-center mb-2 mb-md-4">Tambah Data Buku</h4>
  <form action="../request/create.php" method="POST">
    <div class="mb-3">
      <label for="exampleInputId1" class="form-label">ISBN</label>
      <input type="number" name="id" class="form-control" id="exampleInputId1">
    </div>
    <div class="mb-3">
      <label for="exampleInputId1" class="form-label">Judul</label>
      <input type="text" name="judul" class="form-control" id="exampleInputId1">
    </div>
    <div class="mb-3">
      <label for="exampleInputId1" class="form-label">Penulis</label>
      <input type="text" name="penulis" class="form-control" id="exampleInputId1">
    </div>
    <div class="mb-3">
      <label for="exampleInputId1" class="form-label">Penerbit</label>
      <input type="text" name="penerbit" class="form-control" id="exampleInputId1">
    </div>
    <div class="mb-3">
      <label for="exampleInputId1" class="form-label">Tahun</label>
      <input type="number" name="tahun" class="form-control" id="exampleInputId1">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
<?php
require_once('../../templates/bottom.php');
