<?php
require_once '../templates/navbar.php';
include '../db/connection.php';
// var_dump($_SERVER);
?>
<div style="max-width: 720px;" class="row mx-auto">
    <div class="col">
        <div class="btn btn-primary">
            <a class="text-decoration-none text-white d-flex align-items-center" href="./request/add.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square mx-1" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> Add Books
            </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT id,judul,penulis,penerbit FROM tbl_buku";
                $result = mysqli_query($connection,$query);
                while ($book=mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <th scope="row"><?= $book['id'] ?></th>
                    <td><?= $book['judul'] ?></td>
                    <td><?= $book['penulis'] ?></td>
                    <td><?= $book['penerbit'] ?></td>
                    <td>
                        <a href="<?='./request/edit.php?id='. $book['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="<?='./request/delete.php?id='. $book['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
                </tr>
                <?php  }?>
            </tbody>
        </table>
    </div>
</div>

<?php
require_once '../templates/bottom.php';
?>