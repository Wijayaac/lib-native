<?php

include '../../db/connection.php';

//* retrieve data from request post
$id = $_POST['id'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$query = "UPDATE tbl_buku SET judul='$judul',penulis='$penulis',penerbit='$penerbit',tahun='$tahun' WHERE id='$id'";

if ($connection->query($query) === TRUE) {
    mysqli_close($connection);
    header('location:../index.php');
} else {
    # code...
    echo 'error' . $connection->error;
}
