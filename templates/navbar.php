<?php
include($_SERVER['DOCUMENT_ROOT'] . '/lib-native/db/connection.php');
session_start();
if (isset($_SESSION['sesi'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard Admin</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/css/adminlte.min.css">
        <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/summernote/summernote-bs4.min.css">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="padding-right: 40px;"><i class="fas fa-user">ㅤ</i><?php echo $_SESSION['sesi']; ?></a>
                        <ul class="dropdown-menu">

                            <li role="separator" class="divider"></li>
                            <li><a href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/auth/logout.php">Logout</a></li>
                        </ul>
                    </li>
            </nav>

            <aside class="main-sidebar sidebar-light-success elevation-4">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Data Master
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/member" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Anggota</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/book" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Buku</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Data Transaksi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/peminjaman" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaksi Peminjaman</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/peminjaman/laporan.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Peminjaman</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                </nav>
        </div>
        </aside>
    <?php } else {
    header("location:http://" . $_SERVER['SERVER_NAME'] . "/lib-native/auth/login.php");
}
