<?php
include '../../db/connection.php';
$queryMember = "SELECT nama,id FROM tbl_anggota";
$queryBook = "SELECT id, judul FROM tbl_buku";

$members = mysqli_query($connection, $queryMember);
$books = mysqli_query($connection, $queryBook);
mysqli_close($connection);

?>
<form action="../request/create.php" method="POST">
    <div class="mb-3">
        <label for="exampleDataList" class="form-label">Datalist Members</label>
        <input class="form-control" name="idMember" list="dataListMembers" id="exampleDataList" placeholder="Type to search...">
        <datalist id="dataListMembers">
        <?php while ($member  = mysqli_fetch_array($members)) { ?>
                <option value="<?= $member['id'] ?>"><?= $member['nama'] ?></option>
            <?php } ?>
        </datalist>
    </div>
    <div class="mb-3">
        <label for="exampleDataList" class="form-label">Datalist Books</label>
        <input class="form-control" name="idBook" list="dataListBooks" id="exampleDataList" placeholder="Type to search...">
        <datalist id="dataListBooks">
        <?php while ($book  = mysqli_fetch_array($books)) {
            ?>
            <?= $book['judul'] ?>
                <option value="<?= $book['id'] ?>"><?= $book['judul'] ?></option>
            <?php } ?>
        </datalist>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>