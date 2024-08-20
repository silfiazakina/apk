<?php

 if(empty($_GET['id_peminjaman'])) header("Location: index.php");

 $id_anggota = $_GET['id_peminjaman'];

        $pdo = koneksi::connect();
        $sql = "DELETE FROM peminjaman WHERE id_peminjaman = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_anggota));
        koneksi::connect();
        echo "<script> window.location.href = 'index.php?page=peminjaman' </script> ";