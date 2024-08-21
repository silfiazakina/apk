<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id                   = $_POST['id'];
$nisn                 = $_POST['nisn'];
$nama_pengarang       = $_POST['nama_pengarang'];
$alamat_pengarang     = $_POST['alamat_pengarang'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE pengarang SET nisn = '$nisn', nama_pengarang = '$nama_pengarang', alamat_pengarang = '$alamat_pengarang' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>