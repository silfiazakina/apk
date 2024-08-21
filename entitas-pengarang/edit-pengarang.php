<?php 
  
  //panggil koneksi database
  include('koneksi.php');
  
  $id = $_GET['id'];

//   var_dump($id);
  
  $query = "SELECT * FROM pengarang WHERE id = $id LIMIT 1";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($result);

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Pengarang</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT PENGARANG
            </div>
            <div class="card-body">
              <form action="update-pengarang.php" method="POST">
                
                <div class="form-group">
                  <label>NISN</label>
                  <input type="text" name="nisn" value="<?php echo $row['nisn'] ?>" placeholder="Masukkan NISN Pengarang" class="form-control"/>
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>

                <div class="form-group">
                  <label>Nama Pengarang</label>
                  <input type="text" name="nama_pengarang" value="<?php echo $row['nama_pengarang'] ?>" placeholder="Masukkan Nama Pengarang" class="form-control">
                </div>

                <div class="form-group">
                  <label>Alamat Pengarang</label>
                  <textarea class="form-control" name="alamat_pengarang" placeholder="Masukkan Alamat Pengarang" rows="4"><?php echo $row['alamat_pengarang'] ?></textarea>
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