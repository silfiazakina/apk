<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$tanggal_buku        = $_POST['tanggal_buku'];
$nama_buku           = $_POST['nama_buku'];
$tanggal_penerbit     = $_POST['tanggal_penerbit'];

//query insert data ke dalam database
$query = "INSERT INTO buku (tanggal_buku, nama_buku, tanggal_penerbit) VALUES ('$tanggal_buku', '$nama_buku', '$tanggal_penerbit')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>
