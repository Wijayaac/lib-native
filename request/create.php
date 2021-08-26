<?php

include '../db/connection.php';

//* retrieve data from request post
$id = $_POST['id'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$query = "INSERT INTO tbl_buku(id,judul,penulis,penerbit,tahun) values('$id','$judul','$penulis','$penerbit','$tahun')";

if ($connection->query($query) === TRUE) {
    mysqli_close($connection);
    header('location:../index.php');
} else {
    # code...
    echo 'error' . $connection->error;
}
