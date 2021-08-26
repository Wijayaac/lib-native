<?php ?>
<form action="../request/create.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputId1" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" id="exampleInputId1">
    </div>
    <div class="mb-3">
        <label for="exampleInputId1" class="form-label">Jenis Kelamin</label>
        <select class="form-select" name="jk" aria-label="Default select example">
            <option selected>Pilih Salah Satu</option>
            <option value="0">Perempuan</option>
            <option value="1">Laki - Laki</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputId1" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" checked value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Aktif
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0">
            <label class="form-check-label" for="flexRadioDefault2">
                Tidak Aktif
            </label>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleInputId1" class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control" id="exampleInputId1">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>