<?php
include("../../database/koneksi.php");
include("../../database/class/pegawai.php");


if (empty($_GET['id_pegawai'])) {
    echo "<script>window.location.href = 'index.php?page=pegawai'</script>";
    exit();
}


$id_pegawai = $_GET['id_pegawai'];
$pdo = koneksi::connect();
$pegawai = pegawai::getInstance($pdo);
$result = $pegawai->hapus($id_pegawai);

if ($result) {
    echo "<script>window.location.href = 'index.php?page=pegawai'</script>";
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
