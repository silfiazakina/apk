<?php

 if(empty($_GET['id_pengarang'])) header("Location: index.php");

 $id_penerbit = $_GET['id_pengarang'];

        $pdo = koneksi::connect();
        $sql = "DELETE FROM pengarang WHERE id_pengarang= ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_pengarang));
        koneksi::connect();
        echo "<script> window.location.href = 'index.php?page=pengarang' </script> ";