<?php
include '../../db/connection.php';

$nama = $_POST['nama'];
$jk = $_POST['jk'];
$status = $_POST['status'];
$alamat = $_POST['alamat'];
$fileName = rand() . '.' . substr($_FILES['foto']['type'], 6);
$tmpDir = $_FILES['foto']['tmp_name'];

$targetDir = "../../uploads/";

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($tmpDir);
  if ($check !== false) {
    move_uploaded_file($tmpDir, "$targetDir$fileName");
    $query = "INSERT INTO tbl_anggota(id,nama,jk,status,alamat,foto) values(' ','$nama','$jk','$status','$alamat','$fileName')";
    if ($connection->query($query) === TRUE) {
      mysqli_close($connection);
      header('location:../index.php');
    } else {
      echo 'Error' . $connection->error;
    }
  } else {
    echo "File is not an image.";
  }
}
