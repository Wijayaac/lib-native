<?php
include '../../db/connection.php';

$idMember = $_POST['idMember'];
$idBook = $_POST['idBook'];

$query = "INSERT INTO tbl_peminjaman(id,id_ang,id_buku,status) values(' ','$idMember','$idBook','1')";

if ($connection->query($query) === TRUE) {
    mysqli_close($connection);
    header('location:../index.php');
  } else {
    echo 'Error' . $connection->error;
  }

