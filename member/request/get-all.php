<?php

function getMembers($connection)
{
    $query = 'SELECT id,nama,jk,alamat,status,foto FROM tbl_anggota';
    $items = mysqli_query($connection, $query);
    return $items;
}
