<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Data Pegawai</h3>
            <a href="add.php?page=pegawai&act=tambah" class="btn btn-primary">Tambah Pegawai</a>
        </div>
        <div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>

                </thead>
                <tbody>
                <?php
                        include("../../database/koneksi.php");
                        include("../../database/class/pegawai.php");
                        $pdo = koneksi::connect();
                        $pegawai = pegawai::getInstance($pdo);
                        $dataPegawai = $pegawai->getAll();
                        $no = 1;

                        foreach ($dataPegawai as $row) {
                        ?> 
                        <tr>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td><?php echo htmlspecialchars($row['nisn']); ?></td>
                            <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                            

                            <td>
                                <a href="edit.php?page=pegawai&act=edit&id_pegawai=<?php echo $row['id_pegawai'] ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                                <a href="hapus.php?page=pegawai&act=hapus&id_pegawai=<?php echo $row['id_pegawai'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus 
                                </a>
                            </td>   
                        </tr>
                    <?php
                    }
                   // koneksi::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>