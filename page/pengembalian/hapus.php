<?php
include("../../database/koneksi.php");
include("../../database/class/pengembalian.php");

if (empty($_GET['id_pengembalian'])) {
    echo "<script> window.location.href = 'index.php?page=pengembalian' </script>";
    exit();
}

$id_pengembalian = $_GET['id_pengembalian'];
$pdo = koneksi::connect();
$pengembalian = pengembalian::getInstance($pdo);

$result = $pengembalian->hapus($id_pengembalian);

if ($result) {
    echo "<script>window.location.href = 'index.php?page=pengembalian'</script>";
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>