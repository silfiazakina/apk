<?php 

if (empty ($_GET['id_pengembalian'])) {
    echo "<script> window.location.href = 'index.php?page=pengembalian' </script> ";
    exit();
}
include("../../database/koneksi.php");
include("../../database/class/pengembalian.php");
$id_pengembalian = $_GET['id_pengembalian'];
$pdo = koneksi::connect();
$pengembalian = pengembalian::getInstance($pdo);

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    
   
    $result = $pengembalian->edit($id_pengembalian, $nama, $nisn, $tanggal_pengembalian);
    
    if ($result) {
        echo "<script>window.location.href = 'index.php?page=pengembalian'</script>";
        exit();
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    } 



   
}
    $data = $pengembalian->getID($id_pengembalian);
    if (!$data) {
    echo "<script>window.location.href = 'index.php?page=pengembalian'</script>";
    exit();
    }

    $nama = $data['nama'];
    $nisn = $data['nisn'];
    $tanggal_pengembalian = $data['tanggal_pengembalian'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengembalian</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="mb-4">
            <h3>Edit Data Pengembalian</h3>
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
                <label for="tanggal_pengembalian">Tanggal Kembali</label>
                <input id="tanggal_pengembalian" name="tanggal_pengembalian" type="text" class="form-control" placeholder="Masukkan pengembalian" value="<?php echo htmlspecialchars($tanggal_pengembalian); ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=pengembalian" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>





git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/silfiazakina/aplikasi_perpustakaan.git
git push -u origin main  