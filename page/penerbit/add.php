<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penerbit</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
       <div class="row">
           <div class="col-md-6 offset-md-3">
            <h3>Tambah Penerbit</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input id="nama" name="nama" type="text" class="form-control" placeholder="Masukkan Nama Penerbit" required>
                </div>
                <div class="form-group">
                    <label for="kota_penerbit">Kota Penerbit</label>
                    <input id="kota_penerbit" name="kota_penerbit" type="text" class="form-control" placeholder="Masukkan Nama Kota" required>
                </div>
                <div class="form-group">
                    <label for="no_tlp">No Tlp</label>
                    <input id="no_tlp" name="no_tlp" class="form-control" placeholder="Masukkan Nomor Telepon" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    <a href="index.php?page=penerbit" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
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
    $kota_penerbit = $_POST['kota_penerbit'];
    $no_tlp = $_POST['no_tlp'];

    include("../../database/koneksi.php");
    include("../../database/class/penerbit.php");
    
    $pdo = Koneksi::connect();
    $penerbit = penerbit::getInstance($pdo);
    
    if ($penerbit->add($nama, $kota_penerbit, $no_tlp)) {
        echo "<script>window.location.href = 'index.php?page=penerbit'</script>";
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
}
?>
