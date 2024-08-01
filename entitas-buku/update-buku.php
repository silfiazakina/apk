<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id                = $_POST['id'];
$tanggal_buku      = $_POST['tanggal_buku'];
$nama_buku         = $_POST['nama_buku'];
$tanggal_penerbit  = $_POST['tanggal_penerbit'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE buku SET tanggal_buku = '$tanggal_buku', nama_buku = '$nama_buku', tanggal_penerbit = '$tanggal_penerbit' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>