<?php

 if(empty($_GET['id_penerit'])) header("Location: index.php");

 $id_penerbit = $_GET['id_penerbit'];

        $pdo = koneksi::connect();
        $sql = "DELETE FROM penerbit WHERE id_penerbit= ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_penerbit));
        koneksi::connect();
        echo "<script> window.location.href = 'index.php?page=penerbit' </script> ";