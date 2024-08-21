<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id                = $_POST['id'];
$nisn_peminjaman   = $_POST['nisn_peminjaman'];
$nama_peminjaman   = $_POST['nama_peminjaman'];
$jumlah_peminjaman = $_POST['jumlah_peminjaman'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE detail_peminjaman SET nisn_peminjaman = '$nisn_peminjaman', nama_peminjaman = '$nama_peminjaman', jumlah_peminjaman = '$jumlah_peminjaman' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>