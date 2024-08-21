<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$nisn           = $_POST['nisn'];
$nama_penerbit  = $_POST['nama_penerbit'];
$kota_penerbit        = $_POST['kota_penerbit'];

//query insert data ke dalam database
$query = "INSERT INTO penerbit (nisn, nama_penerbit, kota_penerbit) VALUES ('$nisn', '$nama_penerbit', '$kota_penerbit')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>
