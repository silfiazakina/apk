<?php 
  
  //panggil koneksi database
  include('koneksi.php');
  
  $id = $_GET['id'];

//   var_dump($id);
  
  $query = "SELECT * FROM detail_peminjaman WHERE id = $id LIMIT 1";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($result);

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Detail Peminjaman</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT DETAIL PEMINJAMAN
            </div>
            <div class="card-body">
              <form action="update-detail_peminjaman.php" method="POST">
                
                <div class="form-group">
                  <label>Nisn Peminjaman</label>
                  <input type="text" name="nisn_peminjaman" value="<?php echo $row['nisn_peminjaman'] ?>" placeholder="Masukkan NISN Peminjaman" class="form-control"/>
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>

                <div class="form-group">
                  <label>Nama Peminjaman</label>
                  <input type="text" name="nama_peminjaman" value="<?php echo $row['nama_peminjaman'] ?>" placeholder="Masukkan Nama Peminjaman" class="form-control">
                </div>

                <div class="form-group">
                  <label>Jumlah Peminjaman</label>
                  <textarea class="form-control" name="jumlah_peminjaman" placeholder="Masukkan Jumlah Peminjaman " rows="4"><?php echo $row['jumlah_peminjaman'] ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>