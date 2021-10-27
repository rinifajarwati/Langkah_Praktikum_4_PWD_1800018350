<?php
include_once("koneksi.php");
$result = mysqli_query($con, "SELECT * FROM mahasiswa");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Lihat Data</title>
  </head>
  <body>
    <div class="container">
        <h1>Data Komentar</h1>

        <a href="validasi.php" class="btn btn-success btn-sm m-2">Tambah Komentar</a>

        <table class = "table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Gender</th>
                    <th>Komentar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user_data = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?= $user_data['nama']; ?></td>
                        <td><?= $user_data['email']; ?></td>
                        <td><?= $user_data['website']; ?></td>
                        <td><?= $user_data['gender']; ?></td>
                        <td><?= $user_data['komen']; ?></td>
                    </tr>
                    <?php } ?>
            </tbody>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>