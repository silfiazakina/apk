<?php

 if(empty($_GET['id_pengembalian'])) header("Location: index.php");

 $id_pengembalian = $_GET['id_pengembalian'];

        $pdo = koneksi::connect();
        $sql = "DELETE FROM pengembalian WHERE id_pengembalian = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_anggota));
        koneksi::connect();
        echo "<script> window.location.href = 'index.php?page=pengembalian' </script> ";