<?php
include("../../database/koneksi.php");
include("../../database/class/peminjaman.php");


if (empty($_GET['id_peminjaman'])) {
    echo "<script>window.location.href = 'index.php?page=peminjaman'</script>";
    exit();
}

$id_peminjaman = $_GET['id_peminjaman'];
$pdo = koneksi::connect();
$peminjaman = peminjaman::getInstance($pdo);
$result = $peminjaman->hapus($id_peminjaman);

if ($result) {
    echo "<script>window.location.href = 'index.php?page=peminjaman'</script>";
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
