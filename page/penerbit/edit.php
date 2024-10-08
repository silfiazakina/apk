<?php 

if (empty($_GET['id_penerbit'])) {
    echo "<script> window.location.href = 'index.php?page=penerbit' </script> ";
    exit();
}
include("../../database/koneksi.php");
include("../../database/class/penerbit.php");
$id_penerbit = $_GET['id_penerbit'];
$pdo = koneksi::connect();
$penerbit = penerbit::getInstance($pdo);

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $kota_penerbit = $_POST['kota_penerbit'];
    $no_tlp = $_POST['no_tlp'];

    
   
    $result = $penerbit->edit($id_penerbit, $nama, $kota_penerbit, $no_tlp);
    
    if ($result) {
        echo "<script>window.location.href = 'index.php?page=penerbit'</script>";
        exit();
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    } 



   
}
    $data = $penerbit->getID($id_penerbit);
    if (!$data) {
    echo "<script>window.location.href = 'index.php?page=penerbit'</script>";
    exit();
    }

    $nama = $data['nama'];
    $kota_penerbit= $data['kota_penerbit'];
    $no_tlp = $data['no_tlp'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penerbit</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="mb-4">
            <h3>Edit Data Penerbit</h3>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Masukkan nama" value="<?php echo htmlspecialchars($nama); ?>" required>
            </div>
            <div class="form-group">
                <label for="kota_penerbit">Kota Penerbit</label>
                <input id="kota_penerbit" name="kota_penerbit" type="text" class="form-control" placeholder="Masukkan nama Kota" value="<?php echo htmlspecialchars($kota_penerbit); ?>" required>
            </div>
             <div class="form-group">
                <label for="no_tlp">NO Tlp</label>
                <input id="no_tlp" name="no_tlp" type="text" class="form-control" placeholder="Masukkan Nomor Telepon" value="<?php echo htmlspecialchars($no_tlp); ?>" required>
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