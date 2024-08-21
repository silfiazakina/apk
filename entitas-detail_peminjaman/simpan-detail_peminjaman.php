<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$nisn_peminjaman       = $_POST['nisn_peminjaman'];
$nama_peminjaman          = $_POST['nama_peminjaman'];
$jumlah_peminjaman     = $_POST['jumlah_peminjaman'];

//query insert data ke dalam database
$query = "INSERT INTO detail_peminjaman (nisn_peminjaman, nama_peminjaman, jumlah_peminjaman) VALUES ('$nisn_peminjaman', '$nama_peminjaman', '$jumlah_peminjaman')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>
