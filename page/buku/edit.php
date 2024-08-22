<?php 

if (empty ($_GET['id_buku'])) {
    echo "<script> window.location.href = 'index.php?page=buku' </script> ";
    exit();
}
include("../../database/koneksi.php");
include("../../database/class/buku.php");
$id_buku = $_GET['id_buku'];
$pdo = koneksi::connect();
$buku = buku::getInstance($pdo);

if (isset($_POST['simpan'])) {

    $judul= $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];

    
   
    $result = $buku->edit($id_buku, $judul, $pengarang, $penerbit);
    
    if ($result) {
        echo "<script>window.location.href = 'index.php?page=buku'</script>";
        exit();
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    } 



   
}
    $data = $buku->getID($id_buku);
    if (!$data) {
    echo "<script>window.location.href = 'index.php?page=buku'</script>";
    exit();
    }

    $judul = $data['judul'];
    $pengarang = $data['pengarang'];
    $penerbit = $data['penerbit'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="mb-4">
            <h3>Edit Data Buku</h3>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input id="judul" name="judul" type="text" class="form-control" placeholder="Masukkan judul buku" value="<?php echo htmlspecialchars($judul); ?>" required>
            </div>
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input id="pengarangn" name="pengarang" type="text" class="form-control" placeholder="Masukkan nama pengarang" value="<?php echo htmlspecialchars($pengarang); ?>" required>
            </div>
             <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input id="penerbit" name="penerbit" type="text" class="form-control" placeholder="Masukkan nama penerbit" value="<?php echo htmlspecialchars($penerbit); ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=buku" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>