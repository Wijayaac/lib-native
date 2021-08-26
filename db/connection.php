<?php

    $serverName = 'localhost';
    $databaseName = 'db_jwd';
    $username = 'root';
    $password = '';

    // Create connection into database
    $connection = mysqli_connect($serverName, $username, $password, $databaseName);

    if (mysqli_connect_errno()) {
        die('Connection failed : ' . mysqli_connect_error());
    }
   