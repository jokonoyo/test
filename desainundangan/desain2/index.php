<?php 
require_once "../../config.php";

if (isset($_GET['id'])) { 
    $id = $_GET['id'];

    $sql = "SELECT users.email, 
                    pesanan.tanggal_pemesanan, 
                    pesanan.id_pesanan,
                    desain.nama_desain,
                    pesanan.nama_pengantin_pria,
                    pesanan.nama_pengantin_wanita,
                    pesanan.foto_pengantin_pria,
                    pesanan.foto_pengantin_wanita,
                    pesanan.foto_prewedd_satu,
                    pesanan.foto_prewedd_dua,
                    pesanan.foto_galeri_satu,
                    pesanan.foto_galeri_dua,
                    pesanan.foto_galeri_tiga,
                    pesanan.foto_galeri_empat,
                    pesanan.lokasi_acara,
                    pesanan.nomor_hp,
                    pesanan.waktu_acara,
                    pesanan.tanggal_acara,
                    pesanan.nama_ayah_pengantin_pria,
                    pesanan.nama_ibu_pengantin_pria,
                    pesanan.nama_ayah_pengantin_wanita,
                    pesanan.nama_ibu_pengantin_wanita,
                    pesanan.ayat_kitab_suci,
                    pesanan.norek_pengantin_pria,
                    pesanan.norek_pengantin_wanita   
            FROM users
            JOIN pesanan ON users.id = pesanan.iduser
            JOIN pembayaran ON users.id = pembayaran.iduser
            JOIN desain ON pesanan.id_desain = desain.id_desain
            WHERE pesanan.id_pesanan = $id
            ORDER BY pesanan.id_pesanan DESC";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Desain 2</title>
    <link rel="stylesheet" href="./css/style.css" />

    </style>
    <link rel="shortcut icon" href="../../asetdashboard/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <section class="hero" id="home">
        <main class="content">
            <button class="toggleButton" id="toggleButton">
                <i data-feather="pause"></i>
            </button>

            <img class="kiriatas" src="./aset/kiri atas.png" alt="" />
            <img class="kiritengah" src="./aset/kiri tengah.png" alt="" />
            <img class="kiribawah" src="./aset/kiri bawah.png" alt="" />
            <img class="tengahatas" src="./aset/tengah atas.png" alt="" />
            <img class="kananatas" src="./aset/kanan atas.png" alt="" />
            <img class="kanantengah" src="./aset/kanan tengah.png" alt="" />
            <img class="kananbawah" src="./aset/kanan bawah.png" alt="" />
            <img class="prewed" src="../../file_pesananuser/fotoprewedd/<?php echo $row[8]?>" alt="" />
            <div class="text">
                <h1 class="slide1-h1"><?php echo $row[4] ?> & <?php echo $row[5] ?></h1>
                <p class="slide1-p1">Kepada Bapak/Ibu/Saudara/i</p>
                <p class="slide1-p2">
                    Kami mengundang anda untuk hadir di acara pernikahan kami
                </p>
                <a class="open" href="#slide2" onclick="unlockSection(); playMusic();">Buka undangan</a>
            </div>
        </main>
    </section>

    <!-- ============================== -->
    <section class="slide2" id="slide2">
        <img class="kiriatas" src="./aset/kiri atas.png" alt="" />
        <img class="kiritengah" src="./aset/kiri tengah.png" alt="" />
        <img class="kiribawah" src="./aset/kiri bawah.png" alt="" />
        <img class="tengahatas" src="./aset/tengah atas.png" alt="" />
        <img class="kananatas" src="./aset/kanan atas.png" alt="" />
        <img class="kanantengah" src="./aset/kanan tengah.png" alt="" />
        <img class="kananbawah" src="./aset/kanan bawah.png" alt="" />
        <div class="slide-two">
            <p class="slide2-p1">SAVE THE DATE</p>
            <p class="slide2-p2">The Wedding Of</p>
            <h1 class="slide2-h1"><?php echo $row[4] ?> & <?php echo $row[5] ?></h1>
            <h3 class="slide2-h3"><?php echo $row[17] ?></h3>
            <p class="slide2-p3">Kami harap anda dapat hadir</p>
            <p class="slide2-p4">di hari istimewa kami.</p>
        </div>
    </section>
    <!-- ================================== -->
    <section class="slide3">
        <div class="slide-three">
            <h1>Mempelai</h1>
        </div>
        <div class="slide-three2">
            <div class="pria">
                <img src="../../file_pesananuser/fotopengantinpria/<?php echo $row[6] ?>" alt="" />
                <p class="text1"><?php echo $row[4] ?></p>
                <p class="text2">Putra Kedua</p>
                <p class="text2"><?php echo $row[18] ?> & <?php echo $row[19] ?></p>
            </div>
            <div class="love">
                <img src="./aset/love.png" alt="" />
            </div>
            <div class="wanita">
                <img src="../../file_pesananuser/fotopengantinwanita/<?php echo $row[7] ?>" alt="" />
                <p class="text1"><?php echo $row[5] ?></p>
                <p class="text2">Putri Ketiga</p>
                <p class="text2"><?php echo $row[20] ?> & <?php echo $row[21] ?></p>
            </div>
        </div>
    </section>
    <!-- ======================== -->
    <section class="slide4">
        <img class="kiriatas" src="./aset/kiri atas.png" alt="" />
        <img class="kiritengah" src="./aset/kiri tengah.png" alt="" />
        <img class="kiribawah" src="./aset/kiri bawah.png" alt="" />
        <img class="tengahatas" src="./aset/tengah atas.png" alt="" />
        <img class="kananatas" src="./aset/kanan atas.png" alt="" />
        <img class="kanantengah" src="./aset/kanan tengah.png" alt="" />
        <img class="kananbawah" src="./aset/kanan bawah.png" alt="" />
        <div class="kitab">
            <p class="ayat">Ayat kitab suci</p>
            <div class="isii">
                <pre class="isi"><?php echo $row[22] ?></pre>
            </div>
        </div>
    </section>
    <!-- ================================ -->
    <section class="slide5">
        <div class="title">
            <h1>Galeri</h1>
        </div>
        <div class="galeri1">
            <img src="../../file_pesananuser/fotogaleri/<?php echo $row[10] ?>" alt="" />
            <img src="../../file_pesananuser/fotogaleri/<?php echo $row[11] ?>" alt="" />
            <img src="../../file_pesananuser/fotogaleri/<?php echo $row[12] ?>" alt="" />

        </div>
        <div class="galeri2">
            <img src="../../file_pesananuser/fotogaleri/<?php echo $row[13] ?>" alt="" />
            <img src="../../file_pesananuser/fotoprewedd/<?php echo $row[9] ?>" alt="" />
            <img src="../../file_pesananuser/fotoprewedd/<?php echo $row[8] ?>" alt="" />
        </div>
    </section>
    <!-- =============================== -->
    <section class="slide6">
        <img class="kiriatas" src="./aset/kiri atas.png" alt="" />
        <img class="kiritengah" src="./aset/kiri tengah.png" alt="" />
        <img class="kiribawah" src="./aset/kiri bawah.png" alt="" />
        <img class="tengahatas" src="./aset/tengah atas.png" alt="" />
        <img class="kananatas" src="./aset/kanan atas.png" alt="" />
        <img class="kanantengah" src="./aset/kanan tengah.png" alt="" />
        <img class="kananbawah" src="./aset/kanan bawah.png" alt="" />
        <h1>Resepsi & Akad Nikah</h1>
        <div class="resep">
            <div class="icon1">
                <img src="./aset/resep1.png" alt="" />
                <p><?php echo $row[17] ?></p>
            </div>
            <div class="icon2">
                <img src="./aset/resep2.png" alt="" />
                <p><?php echo $row[14] ?></p>
            </div>
            <div class="icon3">
                <img src="./aset/resep3.png" alt="" />
                <p><?php echo $row[16] ?></p>
            </div>
        </div>
    </section>
    <!-- ===================================== -->
    <section class="slide7">
        <img class="kiriatas" src="./aset/kiri atas.png" alt="" />
        <img class="kiritengah" src="./aset/kiri tengah.png" alt="" />
        <img class="kiribawah" src="./aset/kiri bawah.png" alt="" />
        <img class="tengahatas" src="./aset/tengah atas.png" alt="" />
        <img class="kananatas" src="./aset/kanan atas.png" alt="" />
        <img class="kanantengah" src="./aset/kanan tengah.png" alt="" />
        <img class="kananbawah" src="./aset/kanan bawah.png" alt="" />
        <h1>Amplop Digital</h1>
        <div class="kiasan">
            <p>Doa restu Anda merupakan karunia yang sangat berarti bagi kami.</p>
            <p>Dan jika memberi adalah ungkapan tanda kasih Anda, Anda dapat</p>
            <p>memberi kado secara cashless.</p>
        </div>
        <div class="money">
            <div class="bank1">
                <img src="./aset/bca.png" alt="" />
                <div class="copy">
                    <p id="myText"><?php echo $row[23] ?></p>
                    <button onclick="copyText()">
                        <img src="./aset/copy.png" alt="" />
                    </button>
                </div>
                <p>a/n Roni Evander</p>
            </div>
            <div class="bank2">
                <img src="./aset/bni.png" alt="" />
                <div class="copy">
                    <p id="myText2"><?php echo $row[24] ?></p>
                    <button onclick="copyText2()">
                        <img src="./aset/copy.png" alt="" />
                    </button>
                </div>
                <p>a/n Dyna Rosalina</p>
            </div>
        </div>
    </section>
    <!-- ============================ -->
    <section class="slide8">
        <img class="kiriatas" src="./aset/kiri atas.png" alt="" />
        <img class="kiritengah" src="./aset/kiri tengah.png" alt="" />
        <img class="kiribawah" src="./aset/kiri bawah.png" alt="" />
        <img class="tengahatas" src="./aset/tengah atas.png" alt="" />
        <img class="kananatas" src="./aset/kanan atas.png" alt="" />
        <img class="kanantengah" src="./aset/kanan tengah.png" alt="" />
        <img class="kananbawah" src="./aset/kanan bawah.png" alt="" />
        <p>Terima Kasih Atas Doa & Restunya</p>
        <h1 class="slide2-h1"><?php echo $row[4]?> & <?php echo $row[5]?></h1>
        <a href="#"><i data-feather="arrow-up"></i></a>
    </section>

    <script src="./js/script.js"></script>
    <script>
    feather.replace();
    </script>
</body>

</html>


<?php
    } else {
        echo "No data found for the given ID.";
    }
}
?>