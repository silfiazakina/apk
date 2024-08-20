<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
       <div class="row">
           <div class="col-md-6 offset-md-3">
            <h3>Tambah Buku</h3>
         <form action="" method="post">
        <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input id="judul" name="judul" type="text" class="form-control" placeholder="Masukkan Judul Buku" required>
            </div>
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input id="pengarang" name="pengarang" type="text" class="form-control" placeholder="Masukkan Nama Pengarang" required>
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input id="penerbit" name="penerbit" class="form-control" placeholder="masukkan Nama Penerbit" required>
                </div>

            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=penerbit" class="btn btn-secondary">Kembali</a>
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
 
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
   

    include("../../database/koneksi.php");
    include("../../class/buku.php");
        $pdo = Koneksi::connect();
        $buku = buku::getInstance($pdo);
        if ($buku->add($judul, $pengarang, $penerbit)) {
            echo "<script>window.location.href = 'index.php'</script>";
        } else {
            echo "Terjadi kesalahan saat menyimpan data.";
        }
}
?> 