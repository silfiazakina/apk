<?php 

if (empty($_GET['id_peminjaman'])) {
    echo "<script> window.location.href = 'index.php?page=peminjaman' </script>";
    exit();
}
include("../../database/koneksi.php");
include("../../class/peminjaman.php");
$id_peminjaman = $_GET['id_peminjaman'];
$pdo = koneksi::connect();
$peminjaman = peminjaman::getInstance($pdo);

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $alamat = $_POST['alamat'];

    
   
    $result = $peminjaman->edit($id_peminjaman, $nama, $nisn, $alamat);
    
    if ($result) {
        echo "<script>window.location.href = 'index.php?page=peminjaman'</script>";
        exit();
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    } 



   
}
    $data = $peminjaman->getID($id_peminjaman);
    if (!$data) {
    echo "<script>window.location.href = 'index.php?page=peminjaman'</script>";
    exit();
    }

    $nama = $data['nama'];
    $nisn = $data['nisn'];
    $alamat = $data['alamat'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="mb-4">
            <h3>Edit Peminjaman</h3>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Masukkan nama" value="<?php echo htmlspecialchars($nama); ?>" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input id="nisn" name="nisn" type="text" class="form-control" placeholder="Masukkan nisn" value="<?php echo htmlspecialchars($nisn); ?>" required>
            </div>
             <div class="form-group">
                <label for="alamat">Alamat</label>
                <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" value="<?php echo htmlspecialchars($alamat); ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=peminjaman" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>