<?php

//koneksi database
include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM pengembalian WHERE id = '$id'";

if($connection->query($query)) {
    header("location: index.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>