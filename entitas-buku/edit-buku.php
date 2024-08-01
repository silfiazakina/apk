<?php 
  
  //panggil koneksi database
  include('koneksi.php');
  
  $id = $_GET['id'];

//   var_dump($id);
  
  $query = "SELECT * FROM buku WHERE id = $id LIMIT 1";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($result);

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Anggota</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT BUKU
            </div>
            <div class="card-body">
              <form action="update-buku.php" method="POST">
                
                <div class="form-group">
                  <label>Tanggal Buku</label>
                  <input type="text" name="tanggal_buku" value="<?php echo $row['tanggal_buku'] ?>" placeholder="Masukkan Tanggal Buku" class="form-control"/>
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>

                <div class="form-group">
                  <label>Nama Buku</label>
                  <input type="text" name="nama_buku" value="<?php echo $row['nama_buku'] ?>" placeholder="Masukkan Nama Buku" class="form-control">
                </div>

                <div class="form-group">
                  <label>Tanggal Penerbit</label>
                  <textarea class="form-control" name="tanggal_penerbit" placeholder="Masukkan Tanggal Penerbit " rows="4"><?php echo $row['tanggal_penerbit'] ?></textarea>
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