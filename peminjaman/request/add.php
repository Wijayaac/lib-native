<?php
include '../../db/connection.php';
$queryMember = "SELECT nama,id FROM tbl_anggota";
$queryBook = "SELECT id, judul FROM tbl_buku";

$members = mysqli_query($connection, $queryMember);
$books = mysqli_query($connection, $queryBook);

if ($members || $books) {
    # code...
    mysqli_close($connection);
} else {
    echo 'Error' . $connection->error;
}
require_once('../../templates/navbar.php');
?>
<div class="container py-2 py-md-2 mt-1 mt-md 4" style="max-width: 720px; min-height: 70vh;">
    <h4 class="text-secondary text-center mb-2 mb-md-2">Pinjam Buku</h4>

    <form action="../request/create.php" method="POST">
        <div class="mb-3">
            <label for="exampleDataList" class="form-label">Datalist Members</label>
            <input class="form-control" required name="idMember" list="dataListMembers" id="exampleDataList" placeholder="Type to search...">
            <datalist id="dataListMembers">
                <?php while ($member  = mysqli_fetch_array($members)) { ?>
                    <option value="<?= $member['id'] ?>"><?= $member['nama'] ?></option>
                <?php } ?>
            </datalist>
        </div>
        <div class="mb-3">
            <label for="exampleDataList" class="form-label">Datalist Books</label>
            <input class="form-control" required name="idBook" list="dataListBooks" id="exampleDataList" placeholder="Type to search...">
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
</div>
<?php
require_once('../../templates/bottom.php');
