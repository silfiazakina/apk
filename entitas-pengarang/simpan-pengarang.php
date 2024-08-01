<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$nisn                = $_POST['nisn'];
$nama_pengarang      = $_POST['nama_pengarang'];
$alamat_pengarang    = $_POST['alamat_pengarang'];

//query insert data ke dalam database
$query = "INSERT INTO pengarang (nisn, nama_pengarang, alamat_pengarang) VALUES ('$nisn', '$nama_pengarang', '$alamat_pengarang')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>
