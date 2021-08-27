<?php
session_start();
$_SESSION['sesi'] = NULL;

include "../db/connection.php";

if (isset($_POST['submit'])) {
    $user = isset($_POST['user']) ? $_POST['user'] : "";
    $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
    $query  = mysqli_query($connection, "SELECT * FROM tbl_admin WHERE username = '$user' AND password = '$pass'");
    $sesi = mysqli_num_rows($query);

    if ($sesi == 1) {
        $dataAdmin = mysqli_fetch_array($query);
        $_SESSION['id_admin'] = $dataAdmin['id'];
        $_SESSION['sesi'] = $dataAdmin['nama'];

        echo "<script>alert ('Anda berhasil log In');</script>";
        echo "<meta http-equiv='refresh' content='0; url=http://" . $_SERVER['SERVER_NAME'] . "/lib-native/index.php?user=$sesi'>";
    } else {
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        echo "<script>alert ('Anda gagal Log In');</script>";
    }
} else {
    include 'login.php';
}
