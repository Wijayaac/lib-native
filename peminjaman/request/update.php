<?php
include '../../db/connection.php';

$id = $_POST['id'];
$idMember = $_POST['idMember'];
$idBook = $_POST['idBook'];

$query = "UPDATE tbl_peminjaman SET status='0' WHERE id='$id'";

if ($connection->query($query) === TRUE) {
    mysqli_close($connection);
    header('location:../index.php');
  } else {
    echo 'Error' . $connection->error;
  }

