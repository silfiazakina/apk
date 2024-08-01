<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id                  = $_POST['id'];
$nisn_pengembalian   = $_POST['nisn_pengembalian'];
$nama_pengembalian   = $_POST['nama_pengembalian'];
$jumlah_buku         = $_POST['jumlah_buku'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE pengembalian SET nisn_pengembalian = '$nisn_pengembalian', nama_pengembalian = '$nama_pengembalian', jumlah_buku = '$jumlah_buku' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>