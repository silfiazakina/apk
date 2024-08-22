<?php
include("../../database/koneksi.php");
include("../../database/class/penerbit.php");


if (empty($_GET['id_penerbit'])) {
    echo "<script>window.location.href = 'index.php?page=penerbit'</script>";
    exit();
}


$id_penerbit = $_GET['id_penerbit'];
$pdo = koneksi::connect();
$penerbit = penerbit::getInstance($pdo);
$result = $penerbit->hapus($id_penerbit);

if ($result) {
    echo "<script>window.location.href = 'index.php?page=penerbit'</script>";
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
