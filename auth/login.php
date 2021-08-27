<?php
session_start();
// on login screen, redirect to dashboard if already logged in
if (isset($_SESSION['sesi'])) {
    header("location:http://" . $_SERVER['SERVER_NAME'] . "/lib-native/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h5"><b>ADMIN </b>PERPUSTAKAAN</a>
            </div>
            <div class="card-body">

                <form action="check-login.php" method="POST">

                    <div class="input-group mb-3">
                        <input type="text" name="user" class="form-control" placeholder="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                </form>

            </div>
            <script src="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/jquery/jquery.min.js"></script>
            <script src="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/lib-native/assets/js/adminlte.min.js"></script>
</body>

</html>