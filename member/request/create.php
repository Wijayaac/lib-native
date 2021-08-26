<?php

$target_dir = '../uploads/';
$fileName = $_FILES['foto']['name'];
$tmpDir = $_FILES['foto']['tmp_name'];

$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["foto"]["tmp_name"]);
  if($check !== false) {
      var_dump(move_uploaded_file($tmpDir,"$target_dir$fileName"));
        echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// include '../../db/connection.php';
// $nama = $_POST['nama'];
// $jk = $_POST['jk'];
// $status = $_POST['status'];
// $alamat = $_POST['alamat'];
// $foto = $_POST['foto'];

// $query = "INSERT INTO tbl_anggota(id,nama,jk,status,alamat,foto) values(' ','$nama','$jk','$status','$alamat','$foto')";

// if ($connection->query($query) === TRUE) {
//     # code...
//     echo 'inserted';
// }else{
//     echo 'Error' . $connection->error;
// }