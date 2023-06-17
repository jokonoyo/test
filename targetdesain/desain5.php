<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Desain</title>
    <link rel="stylesheet" href="../cssdashboard/style.css" />
    <link
      rel="shortcut icon"
      href="../asetdashboard/logo.png"
      type="image/x-icon"
    />
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  
  <body>
    <!-- div 1================== -->
    <div class="container1-create">
      <div class="icon">
        <a href="../dashboard.php"><img src="../asetdashboard/left.png" alt=""></li></a>
      </div>
      <img class="iphone" src="../asetdashboard/tunggal2.png" alt="" />
    </div>

    <!-- div 2======================= -->
    <div class="container2-create" a>
      <div class="line">
        <img src="../asetdashboard/Line.png" alt="" />
      </div>
      <h1 class="title">
      <?php
            require_once "../config.php";
            $sql = "SELECT id_desain, nama_desain
                    FROM desain
                    WHERE id_desain = 2";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $nama_desain = $row['nama_desain'];
                $id_desain = $row['id_desain'];
                echo $nama_desain;
            }
            ?>
      </h1>
      <pre class="deskripsi">
Deskipsi product :
Seperti keanggunan bunga lili biru yang menawan,
kasih sayang dan kelembutan mengubah hidup
menjadi penuh warna dan kelembutan.
     </pre
      >
      <h3 class="price">Rp. 250.000</h3>
      <h2 class="price-diskon">Rp. 200.000</h2>
      <a href="../desainundangan/desain2/index.html"  target="_blank" class="preview">Lihat</a>
      
      <?php if (isset($id_desain)) : ?>
            <a href="../buatpesanan1.php?id=<?php echo $id_desain; ?>" target="_blank" class="pesan">Pesan</a>
      <?php endif; ?>
      
    </div>
    <script>
      feather.replace();
    </script>
  </body>
</html>
