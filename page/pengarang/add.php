<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengarang</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
       <div class="row">
           <div class="col-md-6 offset-md-3">
            <h3>Tambah Pengarang</h3>
         <form action="" method="post">
        <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Masukkan Nama Pengarang" required>
            </div>
            <div class="form-group">
                <label for="no_tlp">NO Tlp</label>
                <input id="no_tlp" name="no_tlp" class="form-control" placeholder="masukkan Nomor Telepon" required>
                </div>
        
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=pengarang" class="btn btn-secondary">Kembali</a>
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
    $no_tlp = $_POST['no_tlp'];
    

    include("../../database/koneksi.php");
    include("../../class/pengarang.php");
        $pdo = Koneksi::connect();
        $pengarang = pengarang::getInstance($pdo);
        if ($pengarang->add($nama, $no_tlp)) {
            echo "<script>window.location.href = 'index.php'</script>";
        } else {
            echo "Terjadi kesalahan saat menyimpan data.";
        }
}
?>