<?php 

if (empty ($_GET['id_buku'])) {
    echo "<script> window.location.href = 'index.php?page=buku' </script> ";
    exit();
}
include("../../database/koneksi.php");
include("../../class/buku.php");
$id_buku = $_GET['id_buku'];
$pdo = koneksi::connect();
$buku = buku::getInstance($pdo);

if (isset($_POST['simpan'])) {

    $juduk= $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];

    
   
    $result = $buku->edit($id_anggota, $judul, $pengarang, $penerbit);
    
    if ($result) {
        echo "<script>window.location.href = 'index.php?page=buku0'</script>";
        exit();
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    } 



   
}
    $data = $anggota->getID($id_anggota);
    if (!$data) {
    echo "<script>window.location.href = 'index.php?page=anggota'</script>";
    exit();
    }

    $nama = $data['nama'];
    $nisn = $data['nisn'];
    $Alamat = $data['Alamat'];
    $tanggal_lahir = $data['tanggal_lahir'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="mb-4">
            <h3>Edit Anggota</h3>
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
                <label for="Alamat">Alamat</label>
                <input id="Alamat" name="Alamat" type="text" class="form-control" placeholder="Masukkan Alamat" value="<?php echo htmlspecialchars($Alamat); ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal lahir</label>
                <input id="tanggal_lahir" name="tanggal_lahir" type="text" class="form-control" placeholder="Masukkan tanggal lahir" value="<?php echo htmlspecialchars($tanggal_lahir); ?>" required>
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