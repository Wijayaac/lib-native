<?php

function getMembers($connection)
{
    $query = 'SELECT tbl_peminjaman.id,tbl_peminjaman.created_at AS date,tbl_peminjaman.status, tbl_anggota.nama, tbl_buku.judul AS buku FROM `tbl_peminjaman` LEFT JOIN `tbl_buku` ON tbl_buku.id = tbl_peminjaman.id_buku LEFT JOIN `tbl_anggota` ON tbl_anggota.id = tbl_peminjaman.id_ang';
    $items = mysqli_query($connection, $query);
    return $items;
}
