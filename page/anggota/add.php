<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
       <div class="row">
           <div class="col-md-6 offset-md-3">
            <h3>Tambah Anggota</h3>
         <form action="" method="post">
        <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Masukkan Nama Anggota" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input id="nisn" name="nisn" type="text" class="form-control" placeholder="Masukkan nisn" required>
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input id="Alamat" name="Alamat" class="form-control" placeholder="masukkan alamat" required>
                </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input id="tanggal_lahir" name="tanggal_lahir" type="text" class="form-control" placeholder="Masukkan Tanggal Lahir" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=anggota" class="btn btn-secondary">Kembali</a>
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


if(isset($_POST['simpan'])){
 
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $Alamat = $_POST['Alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
   

    include("../../database/koneksi.php");
    include("../../database/class/anggota.php");
        $pdo = Koneksi::connect();
        $anggota = anggota::getInstance($pdo);
        if ($anggota->add($nama, $nisn, $Alamat, $tanggal_lahir)) {
            echo "<script>window.location.href = 'index.php'</script>";
        } else {
            echo "Terjadi kesalahan saat menyimpan data.";
        }
}
?> 