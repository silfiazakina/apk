<?php
include("../../database/koneksi.php");
include("../../database/class/anggota.php");

if (empty($_GET['id_anggota'])) {
    echo "<script>window.location.href = 'index.php?page=anggota'</script>";
    exit();
}


$id_anggota = $_GET['id_anggota'];
$pdo = koneksi::connect();
$anggota = anggota::getInstance($pdo);
$result = $anggota->hapus($id_anggota);

if ($result) {
    echo "<script>window.location.href = 'index.php?page=anggota'</script>";
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
