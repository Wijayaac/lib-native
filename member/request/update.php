<?php

include '../../db/connection.php';
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$status = $_POST['status'];
$alamat = $_POST['alamat'];
$id = $_POST['id'];
$fileName = rand() . '.' . substr($_FILES['foto']['type'], 6);
$tmpDir = $_FILES['foto']['tmp_name'];

var_dump($_FILES['foto']);

$targetDir = "../../uploads/";

if (isset($_POST['submit']) && isset($_FILES['foto']['error']) === 4) {
    $check = getimagesize($tmpDir);
    if ($check !== false) {
        move_uploaded_file($tmpDir, "$targetDir$fileName");
        $query = "UPDATE tbl_anggota SET nama='$nama',jk='$jk',status='$status',alamat='$alamat',foto='$fileName' WHERE id='$id'";
        if ($connection->query($query) === TRUE) {
            mysqli_close($connection);
            header('location:../index.php');
        } else {
            echo 'Error' . $connection->error;
        }
    } else {
        echo 'File is not an image';
    }
} else {
    $query = "UPDATE tbl_anggota SET nama='$nama',jk='$jk',status='$status',alamat='$alamat' WHERE id='$id'";
    if ($connection->query($query) === TRUE) {
        mysqli_close($connection);
        header('location:../index.php');
    } else {
        echo 'Error' . $connection->error;
    }
}
