<?php
include("../../database/koneksi.php");
include("../../database/class/pengarang.php");


if (empty($_GET['id_pengarang'])) {
    echo "<script>window.location.href = 'index.php?page=pengarang'</script>";
    exit();
}


$id_pengarang = $_GET['id_pengarang'];
$pdo = koneksi::connect();
$pengarang = pengarang::getInstance($pdo);
$result = $pengarang->hapus($id_pengarang);

if ($result) {
    echo "<script>window.location.href = 'index.php?page=pengarang'</script>";
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
