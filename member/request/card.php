<?php
include '../../db/connection.php';
$id = $_GET['id'];

$query = "SELECT nama,jk,alamat,status,foto FROM tbl_anggota WHERE id = '$id'";
$result = mysqli_query($connection, $query);
if ($result) {
    $data = mysqli_fetch_assoc($result);
    mysqli_close($connection);
} else {
    $connection->error;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <!-- style -->
</head>

<body>
    <h4 style="font-weight: 800;">Kartu Anggota</h4>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th> <img class="img-thumbnail" width="150px" src="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/uploads/<?= $data['foto'] ?>" alt=" <?= $data['foto'] ?>" srcset=""></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nama :</td>
                <td><?= $data['nama'] ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin :</td>
                <td><?= $data['jk'] == 0 ? 'Perempuan' : 'Laki - laki' ?></td>
            </tr>
            <tr>
                <td>Status :</td>
                <td><?= $data['status'] == 0 ? 'Tidak Aktif' : 'Aktif' ?></td>
            </tr>
            <tr>
                <td>Alamat :</td>
                <td><?= $data['alamat'] ?></td>
            </tr>
        </tbody>
    </table>

    <script>
        // Method use for printing this page
        window.print();
    </script>
</body>

</html>