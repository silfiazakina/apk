<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
     <div class="row">
      <div class="col-md-6 offset-md-3">
        <h3>Tambah Pegawai</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Pegawai" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" id="nisn" name="nisn" class="form-control" placeholder="Masukkan NISN" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
            </div>
        
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
      </div>
     </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $alamat = $_POST['alamat'];

    try {
        include("../../database/koneksi.php");
        include("../../database/class/pegawai.php");

        $pdo = koneksi::connect();
        $pegawai = pegawai::getInstance($pdo);

        if ($pegawai->add($nama, $nisn, $alamat)) {
            echo "<script>window.location.href = 'index.php'</script>";
        } else {
            echo "Terjadi kesalahan saat menyimpan data.";
        }
    } catch (Exception $e) {
        // Tangani kesalahan jika terjadi kesalahan lain
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>
