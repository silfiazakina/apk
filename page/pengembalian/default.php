<?php
include("../../database/koneksi.php");
include("../../class/pengembalian.php");


$valid_actions = ['tambah', 'edit', 'hapus'];
$act = isset($_GET['act']) ? $_GET['act'] : '';

if (in_array($act, $valid_actions)) {
    
    $file = __DIR__ . '/' . $act . '.php';
    if (file_exists($file)) {
        include $file;
    } else {
        include 'index.php';
    }
} else {
    include 'index.php';
}
?>
