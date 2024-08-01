<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id            = $_POST['id'];
$nisn          = $_POST['nisn'];
$nama_penerbit = $_POST['nama_penerbit'];
$kota_penerbit = $_POST['kota_penerbit'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE penerbit SET nisn = '$nisn', nama_penerbit= '$nama_penerbit', kota_penerbit= '$kota_penerbit' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>