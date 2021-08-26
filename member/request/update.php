<?php

include '../../db/connection.php';
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$status = $_POST['status'];
$alamat = $_POST['alamat'];
$foto = $_POST['foto'];

$query = "INSERT INTO tbl_anggota(id,nama,jk,status,alamat,foto) values(' ','$nama','$jk','$status','$alamat','$foto')";

if ($connection->query($query) === TRUE) {
    # code...
    echo 'inserted';
}else{
    echo 'Error' . $connection->error;
}