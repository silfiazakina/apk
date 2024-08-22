<?php
include("../../database/koneksi.php");
include("../../database/class/buku.php");


if (empty($_GET['id_buku'])) {
    echo "<script>window.location.href = 'index.php?page=buku'</script>";
    exit();
}
$id_buku = $_GET['id_buku'];
$pdo = koneksi::connect();
$buku = buku::getInstance($pdo);
$result = $buku->hapus($id_buku);

if ($result) {
    echo "<script>window.location.href = 'index.php?page=buku'</script>";
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
