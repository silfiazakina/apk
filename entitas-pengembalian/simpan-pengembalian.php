<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$nisn_pengembalian   = $_POST['nisn_pengembalian'];
$nama_pengembalian   = $_POST['nama_pengembalian'];
$jumlah_buku = $_POST['jumlah_buku'];

//query insert data ke dalam database
$query = "INSERT INTO pengembalian (nisn_pengembalian, nama_pengembalian, jumlah_buku) VALUES ('$nisn_pengembalian', '$nama_pengembalian', '$jumlah_buku')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>
