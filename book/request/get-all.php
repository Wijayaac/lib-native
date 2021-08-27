<?php

function getBooks($connection)
{
    $query = 'SELECT id,judul,penulis,penerbit FROM tbl_buku';
    $items = mysqli_query($connection, $query);
    if ($items) {
        # code...
        mysqli_close($connection);
        return $items;
    } else {
        echo 'Error' . $connection->error;
    }
}
