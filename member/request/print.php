<!-- Page rendering for print purpose get data from Controller Product, method -->
<?php
include '../../db/connection.php';
require_once 'get-all.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <!-- style -->
    <style>
        table,
        tr,
        th,
        td {
            border: 0.5px solid black;
            border-spacing: 0px !important;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table td,
        .table th {
            padding: .5rem;
            vertical-align: top;
            border-top: 1px solid black;
        }
    </style>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = getMembers($connection);
            while ($book = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <th scope="row"><?= $book['id'] ?></th>
                    <td><?= $book['nama'] ?></td>
                    <td><?= $book['jk'] == 0 ? 'Perempuan' : 'Laki - Laki' ?></td>
                    <td><?= $book['alamat'] ?></td>
                    <td><?= $book['status'] == 0 ? 'Nonaktif' : 'Aktif' ?></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>

    <script>
        // Method use for printing this page
        window.print();
    </script>
</body>

</html>