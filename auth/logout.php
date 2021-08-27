<?php

session_start();
session_destroy();

// mengalihkan ke halaman login dan mengirim pesan 
header("location:http://" . $_SERVER['SERVER_NAME'] . "/lib-native/auth/login.php?pesan=logout'");
