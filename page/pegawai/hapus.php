<?php
if ($currentUser['level'] != 1) {
    echo "<script>window.location = 'index.php?alert=err2';</script>";
    exit;
}

$pdo = Koneksi::connect();
$pegawai= Pegawai::getInstance($pdo);

$id_pegawai = isset($_GET['id_pegawai']) ? $_GET['id_pegawai'] : null;

if ($id_pegawai && $pegawai->hapus($id_pegawai)) {
    echo "<script>window.location.href = 'index.php?page=pegawai&alert=hapus'</script>";
} else {
    echo "Gagal menghapus pegawai.";
}