<?php
require_once('./templates/navbar.php');
include './db/connection.php';
// query for books graph
$queryBookData = "SELECT count(id) as total FROM tbl_buku GROUP BY tahun ORDER BY id desc";
$queryBookLabel = "SELECT tahun FROM tbl_buku GROUP BY tahun ORDER BY tahun asc";

// query for anggota graphs
$queryAnggotaData = "SELECT COUNT(id) as total FROM tbl_anggota GROUP BY status ORDER BY status asc";

// query for pinjam graphs
$queryPinjamData = "SELECT COUNT(id) as total FROM tbl_peminjaman GROUP BY status ORDER BY status asc";
//fetch from db 
$resultsBookData = mysqli_query($connection, $queryBookData);
$resultsBookLabel = mysqli_query($connection, $queryBookLabel);
$resultsAnggotaData = mysqli_query($connection, $queryAnggotaData);
$resultsPinjamData = mysqli_query($connection, $queryPinjamData);

mysqli_close($connection);
?>
<!-- main sections -->
<div class="content-wrapper" style="min-height: 80vh;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Beranda</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <br><br>
                    <h1 style="color:blue;"><b>SELAMAT DATANG DI SISTEM INFORMASI PERPUSTAKAAN</b></h1>
                    <h1 style="color:red;">"MEMBACA ADALAH JENDELA DUNIA"</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <h2 class="text-left">Rangkuman</h2>
        <section class="row row-cols-1 row-cols-md-3">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-success">
                        <div class="card-title text-white">Grafik Buku</div>
                    </div>
                    <div class="card-body">
                        <canvas id="bookChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="card-title text-white">Grafik Anggota</div>
                    </div>
                    <div class="card-body">
                        <canvas id="anggotaChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="card-title text-white">Grafik Pinjaman</div>
                    </div>
                    <div class="card-body">
                        <canvas id="pinjamChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    var ctxBook = document.getElementById('bookChart').getContext('2d');
    var bookChart = new Chart(ctxBook, {
        type: 'bar',
        data: {
            labels: [<?php while ($label = mysqli_fetch_array($resultsBookLabel)) {
                            echo '"' . $label['tahun'] . '",';
                        } ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php while ($data = mysqli_fetch_array($resultsBookData)) {
                            echo '"' . $data['total'] . '",';
                        } ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var ctxAnggota = document.getElementById('anggotaChart').getContext('2d');
    var anggotaChart = new Chart(ctxAnggota, {
        type: 'doughnut',
        data: {
            labels: ['Nonaktif', 'Aktif'],
            datasets: [{
                label: '# of Votes',
                data: [<?php while ($data = mysqli_fetch_array($resultsAnggotaData)) {
                            echo '"' . $data['total'] . '",';
                        } ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var ctxPinjam = document.getElementById('pinjamChart').getContext('2d');
    var pinjamChart = new Chart(ctxPinjam, {
        type: 'pie',
        data: {
            labels: ['Dikembalikan', 'Dipinjam'],
            datasets: [{
                label: '# of Votes',
                data: [<?php while ($data = mysqli_fetch_array($resultsPinjamData)) {
                            echo '"' . $data['total'] . '",';
                        } ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<!-- end of main sections -->
<?php
require_once('./templates/bottom.php');
?>