<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengembalian</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
       <div class="row">
           <div class="col-md-6 offset-md-3">
            <h3>Tambah Pengembalian</h3>
         <form action="" method="post">
        <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Masukkan Nama Pengembali" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input id="nisn" name="nisn" type="text" class="form-control" placeholder="Masukkan nisn" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pengembalian">Tanggal Kembali</label>
                <input id="tanggal_pengembalian" name="tanggal_pengembalian" type="text" class="form-control" placeholder="Masukkan Tanggal Kembali" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=pengembali" class="btn btn-secondary">Kembali</a>
            </div>

        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    include("../../database/koneksi.php");
    include("../../database/class/pengembalian.php");

    try {
        $pdo = Koneksi::connect();
        $pengembalian = Pengembalian::getInstance($pdo);

        // Menyimpan data
        if ($pengembalian->add($nama, $nisn, $tanggal_pengembalian)) {
            echo "<script>window.location.href = 'index.php'</script>";
        } else {
            echo "Terjadi kesalahan saat menyimpan data.";
        }
    } catch (Exception $e) {
        echo "Terjadi kesalahan: " . htmlspecialchars($e->getMessage());
    }
}
?>
