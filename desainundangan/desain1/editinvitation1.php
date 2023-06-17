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
                    pesanan.nomor_hp,
                    pesanan.lokasi_acara,
                    pesanan.waktu_acara,
                    pesanan.tanggal_acara,
                    pesanan.nama_ayah_pengantin_pria,
                    pesanan.nama_ibu_pengantin_pria,
                    pesanan.nama_ayah_pengantin_wanita,
                    pesanan.nama_ibu_pengantin_wanita,
                    pesanan.ayat_kitab_suci,
                    pesanan.foto_pengantin_pria,
                    pesanan.foto_pengantin_wanita,
                    pesanan.foto_prewedd_satu,
                    pesanan.foto_galeri_satu,
                    pesanan.norek_pengantin_pria,
                    pesanan.norek_pengantin_wanita,
                    pesanan.lagu,
                    pesanan.status_pesanan,
                    pembayaran.tanggal,
                    pembayaran.bukti_pembayaran,
                    pembayaran.status_pembayaran,
                    pembayaran.id_pembayaran,
                    pesanan.foto_prewedd_dua,
                    pesanan.foto_galeri_tiga,
                    pesanan.foto_galeri_empat,
                    pesanan.linkundangan,
                    pesanan.id_desain,
                    pesanan.foto_prewedd_satu,
                    pesanan.foto_prewedd_dua,
                    pesanan.foto_pengantin_pria,
                    pesanan.foto_pengantin_wanita,
                    pesanan.foto_galeri_satu,
                    pesanan.foto_galeri_dua,
                    pesanan.foto_galeri_tiga,
                    pesanan.foto_galeri_empat
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

<html>
<meta charset="utf-8">
  <title>Jongsuk & Yoona</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!-- font awesome css -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <!-- default skin -->
  <link rel="stylesheet" class="alternate-style" type="text/css" href="css/skins/pink.css">
  <style>
    /*fonts*/
    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Italiana&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inria+Serif:wght@300&display=swap');


    /* DEFAULT STYLE */
    body {
        margin: 0;
        line-height: 1.5;
        font-size: 16px;
        font-weight: 400;
        background-color: #f3f2f1;
    }
    *:not(i){
        font-family: 'Roboto', sans-serif;
    }
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    a{
        text-decoration: none;
    }
    :before,:after{
        box-sizing: border-box;
    }
    img{
        max-width: 100%;
        vertical-align: middle;
    }
    .container{
        max-width: 1140px;
        margin: auto;
    }
    header,
    section,
    footer{
        display: block;
        width: 100%;
    }
    .row{
        display: flex;
        flex-wrap: wrap;
    }
    .justify-content-between{
        justify-content: space-between;
    }
    .align-items-center{
        align-items: center;
    }
    .section-title{
        flex: 0 0 100%;
        max-width: 100%;
        padding: 0 15px;
        text-align: center;
        margin-bottom: 60px;
    }
    .section-title h2{
        font-size: 45px;
        color: #000000;
        font-weight: 700;
        font-family: 'Great Vibes', cursive;
        letter-spacing: 2px;
    }

    .btn-1{
        padding: 10px 35px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        border: 2px solid transparent;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.5s ease;
        font-weight: 500;
    }
    .btn-1:focus{
        outline: none;
    }
    .btn-1:hover{
        background-color: transparent;
    }

    /* HEADER */
    .header{
        position: fixed;
        width: 100%;
        left: 0;
        top: 0;
        z-index: 99;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.5s ease;
    }
    .header.fixed{
        background-color: #fff;
        box-shadow: 0 0 8px #cccccc;
    }
    .header .logo{
        padding:0 15px;
    }
    .header .logo a{
        font-size: 30px;
        color: #fff;
        font-family: 'Great Vibes', cursive;
        letter-spacing: 2px;
        transition: all 0.5s ease;
    }
    .header.fixed .logo a{
        color: #000000;
    }
    .header .hamburger-btn{
        display: inline-block;
        height: 34px;
        width: 40px;
        border-radius: 3px;
        border: 1px solid #fff;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.5s ease;
        display: none;
        
    }
    .header.fixed .hamburger-btn{
        border-color: #000000;
        background-color: #000000;
    }
    .header .hamburger-btn span{
        display: block;
        height: 1px;
        width: 16px;
        background-color: #fff;
        position: relative;
        transition: all 0.5s ease;
    }
    /* .header.fixed .hamburger-btn span:before,
    .header.fixed .hamburger-btn span:after,
    .header.fixed .hamburger-btn span{
        background-color: #000000;
    } */
    .header .hamburger-btn span:before,
    .header .hamburger-btn span:after{
        content: '';
        position: absolute;
        height: 1px;
        width: 100%;
        left: 0;
        background-color: #fff;
        /* transition: all 0.5s ease; */
    }
    .header .hamburger-btn span:before{
        top: -6px;
    }
    .header .hamburger-btn span:after{
        top: 6px;
        
    }
    .header .nav{
        padding:0 15px;
    }
    .header .nav ul{
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .header .nav ul li{
        display: inline-block;
        margin-left: 30px;
    }
    .header .nav ul li a{
        display: block;
        padding: 25px 0;
        color: #fff;
        font-size: 15px;
        text-transform: uppercase;
        transition:color 0.5s ease;
    }
    .header.fixed .nav ul li a{
        color: #555555;
    }

    /* HOME SECTION */
    .home-section {
        min-height: 100vh;
        position: relative;
    }
    .home-section .slide{
        background-position: center;
        background-size: cover;
        position: absolute;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        visibility: hidden;
        transition: all 1s ease-in-out;
    }
    .home-section .slide.active{
        opacity: 1;
        visibility: visible;
    }
    .home-section .slide:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: -1;
    }
    .home-section .row{
        min-height: 100vh;
    }
    .home-section .home-content{
        flex: 0 0 100%;
        max-width: 100%;
        padding: 0 15px;
        text-align: center;
    }
    .home-section .home-content p{
        font-size: 24px;
        color: #fff;
        margin: 0 0 15px;
    }
    .home-section .slide.active .home-content p{
        opacity: 0;
        animation: fadeInTop 1s ease forwards;
    }
    @keyframes fadeInTop{
        0%{
            transform: translateY(-50px);
        }
        100%{
            opacity: 1;
            transform: translateY(0px);
        }
    }
    .home-section .home-content h1{
        font-size: 80px;
        color: #fff;
        margin: 0;
        font-weight: normal;
        font-family: 'Great Vibes', cursive;
    }
    .home-section .slide.active .home-content h1{
        opacity: 0;
        animation: fadeInTop 1s ease forwards;
        animation-delay: 0.5s;
    }
    .home-section .home-content span{
        font-size: 20px;
        display: inline-block;
        border: 1px solid #fff;
        border-radius: 30px;
        color: #fff;
        padding: 7px 30px;
        margin: 15px 0 0;
    }
    .home-section .slide.active .home-content span{
        opacity: 0;
        animation: fadeInTop 1s ease forwards;
        animation-delay: 1s;
    }

    /* COUPLE SECTION */
    .couple-section{
        padding: 80px 0 80px;
    }
    .couple-section .couple{
        flex: 0 0 50%;
        max-width: 50%;
        padding: 0 60px;
        text-align: center;
        position: relative;
    }
    .couple-section .couple:nth-child(2):before{
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 1px;
        height: 100%;
        background-color: #cccccc;
    }
    .couple-section .couple i.fa-heart{
        position: absolute;
        left: -15px;
        width: 31px;
        background-color:#f3f2f1;
        padding: 5px;
        text-align: center;
        font-size: 18px;
        top: 30%;
    }
    .couple-section .couple img{
        max-width: 280px;
        width: 100%;
        border-radius: 50%;
        border: 10px solid transparent;
        border-color: #fb839e
    }
    .couple-section .couple h3{
        font-size: 40px;
        margin: 15px 0;
        font-family: 'Great Vibes', cursive;
        font-weight: normal;
        letter-spacing: 2px;
    }
    .couple-section .couple p{
      font-size: 16px; 
      line-height: 26px;
      color: #555555;
      margin: 0;
    }

    /* RESEPSI SECTION */
    .resepsi-section{
        padding: 80px 0 80px;

    }
    .resepsi-section .block1{
        flex: 0 0 50%;
        max-width: 50%;
        padding: 0 60px;
        text-align: center;
        position: relative;
        color: #555555;
        line-height: 30px;
    }
    .resepsi-section .block2{
        padding-top: 60px;
        font-size: 16px; 
        line-height: 30px;
        color: #555555;
        margin: auto;
        text-align: center;
    }


    /* AYAT SECTION */

    .ayat-section{
        padding: 80px 0 80px;
    }

    .section-title .h2ayat{
        padding-top: 210px;
        font-size: 45px;
        color: #000000;
        font-weight: 700;
        font-family: 'Great Vibes', cursive;
        letter-spacing: 2px;
    }
    .ayat-section .gambar img {
        margin-right: 0;
    }
    .ayat-section .ayat-content p{
        font-size: 16px; 
        /* line-height: 26px; */
        color: #555555;
        padding-top: 20px;
        padding-left: 200px;
        padding-right: 200px;
        margin: auto;
        text-align: center;
    }
    .ayat-section .background {
        min-height: 100vh;
        position: relative;
        background-position: center;
        background-size: cover;
    }

    /* AMPLOP SECTION */
    .amplop-section{
        padding: 80px 0 80px;
    }
    .amplop-section .section-paragraf p{
        font-size: 16px; 
        line-height: 26px;
        color: #555555;
        margin: 0;
        text-align: center;
    }
    .amplop-section .bank{
        flex: 0 0 50%;
        max-width: 50%;
        padding: 0 60px;
        text-align: center;
        position: relative;
    }
    .amplop-section .bank img{
        max-width: 250px;
        width: 100%;
        margin: 40px 0;
    }
    .norek-copy {
        position: relative;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-top: 50px;
    }
    .norek-copy input.text {
        padding: 10px;
        font-size: 16px;
        color: #555555;
        text-align: center;
        border: none;
        outline: none;
    }
    .norek-copy button {
        padding: 5px;
        color: #555555;
        font-size: 16px;
        border: none;
        outline: none;
        background: #fff;
        cursor: pointer;
    }
    .amplop-section .bank .name-norek p{
        padding: 10px;
        font-size: 16px; 
        line-height: 26px;
        color: #555555;
        margin: 0;
        text-align: center;
    } 

    /* GALLERY SECTION */
    .gallery-section{
        padding: 80px 0 80px;
    }
    .gallery-section .gallery-item{

        flex:0 0 33.33% ;
        max-width: 33.33%;
        padding: 15px;
        
    }
    .gallery-section .gallery-item-inner{
        overflow: hidden;
        cursor: pointer;
    }
    .gallery-section .gallery-item-inner img{
        width: 100%;
        transform: scale(1.1);
        transition: all 0.5s ease;
    }
    .gallery-section .gallery-item-inner:hover img{
        transform: scale(1);
    }
    /* GALLERY POPUP */
    .gallery-popup{
        cursor: zoom-out;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 1099;
        background-color: rgba(0,0,0,0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        display: none;
    }
    .gallery-popup.open{
        display: flex;
    }
    .gallery-popup img.gp-img{
        width: auto;
        height: auto;
        max-width: 100%;
        padding: 40px 0;
    }
    .gallery-popup .gp-container{
        position: relative;
        cursor: auto;
    }
    .gallery-popup .gp-counter{
        display: block;
        height: 40px;
        color: #fff;
        font-size: 16px;
        position: absolute;
        left: 0;
        top: 0;
        line-height: 40px;
        font-weight: bold;
    }
    .gallery-popup .gp-close{
        display: block;
        height: 40px;
        width: 40px;
        color: #fff;
        font-size: 30px;
        position: absolute;
        right: 0;
        top: 0;
        text-align: center;
        line-height: 38px;
        overflow: hidden;
        cursor: zoom-out;
    }
    .gallery-popup .gp-controls{
        position: absolute;
        left: 0;
        bottom: 0;
        height: 40px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .gallery-popup .gp-controls .prev,
    .gallery-popup .gp-controls .next{
        display: inline-block;
        margin: 0 10px;
    }
    .gallery-popup .gp-controls .prev i,
    .gallery-popup .gp-controls .next i{
        color: #fff;
        font-size: 20px;
        display: block;
        height: 30px;
        width: 30px;
        text-align: center;
        line-height: 30px;
        cursor: pointer;
        border-radius: 2px;
        transition: all 0.5 ease;
    }
    .gallery-popup .gp-controls .prev:hover i,
    .gallery-popup .gp-controls .next:hover i{
        background-color: rgba(0,0,0,0.7);
    }

    /*  RSVP SECTION */
    .ucapan-section{
        padding: 80px 0 80px;
        background-color: #fb839e;
    }
    .ucapan-section .section-title h2,
    .ucapan-section .section-title p{
        color: #fff;
    }
    .ucapan-section .section-title p{
        margin: 10px 0 0;
        font-size: 16px;
        line-height: 26px;
    }
    .ucapan-section .ucapan-form{
        flex: 0 0 100%;
        max-width: 100%;
    }
    .ucapan-section .form{
        max-width: 600px;
        background-color: #fff;
        margin: auto;
        padding: 60px 25px;
        box-shadow: 0 0 10px #888888;
    }
    .ucapan-section .form .input-group{
        flex: 0 0 100%;
        max-width: 100%;
        padding: 0 15px;

    }
    .ucapan-section .form .input-group.w50{
        flex: 0 0 50%;
        max-width: 50%;

    }
    .ucapan-section .form .input-control{
        display: block;
        width: 100%;
        height: 45px;
        margin-bottom: 30px;
        font-size: 16px;
        color: #000000;
        padding: 6px 12px;
        border: 1px solid #cccccc;
    }
    .ucapan-section .form textarea.input-control{
        height: 120px;
        padding-top: 12px;
        resize: none;
    }
    .ucapan-section .form .input-control:focus{
        outline: none;
    }

    /* FOOTER */
    .footer{
        padding: 130px 0 130px; 
    }
    .footer .footer-content{
        flex: 0 0 100%;
        max-width: 100%;
        padding: 0 15px;
    }
    .footer .footer-content .couple-name{
        width: 400px;
        height: 400px;
        border-radius: 50%;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    .footer .footer-content .couple-name img{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        /* transform: rotate(100deg); */
    }
    .footer .footer-content .couple-name h2{
        font-size: 40px;
        font-family: "Great Vibes", cursive;
        color: #000000;
        margin: 0;
        font-weight: normal;
        text-align: center;
        text-transform: capitalize;
        letter-spacing: 2px;
    }
    .footer .footer-content .couple-name h2 span{
        font-family: "Great Vibes", cursive;
        font-weight: normal;
        display: block;
        text-align: center;
    }
    .footer .footer-content p{
        font-size: 40px;
        font-family: "Great Vibes", cursive;
        color: #000000;
        margin: 0;
        font-weight: normal;
        text-align: center;
        text-transform: capitalize;
    }

    /* COPYRIGHT TEXT */
    p.copyright-text{
        text-align: center;
        font-size: 14px;
        padding: 0 15px;
        color: #555555;
        padding: 20px 0;
        border-top: 1px solid #cccccc;
    }
   
    /* responsive */
    @media(min-width: 768px){
    .header .nav{
        display: block!important;
      }
    }
    @media(max-width: 768px){
        .header .logo{
            padding: 8px 15px;
        }
        .header .hamburger-btn{
            display: flex;
            margin-right: 15px;
        }
        .header .nav{
            flex: 0 0 100%;
            max-width: 100%;
            background-color: #ffffff;
            border-top: 1px solid #cccccc;
            display: none;
        }
        .header .nav ul li{
            display: block;
            margin-left: 0;
        }
        .header .nav ul li a {
            color: #555555;
            padding: 10px 0;
        }
        .home-section .home-content h1{
            font-size: 60px;
        }
        /* couple */
        .couple-section .couple{
            flex: 0 0 100%;
            max-width: 100%;
            padding: 10px 15px;
        }
        .couple-section .couple i.fa-heart{
          color: #f3f2f1;
        }.couple-section .couple img{
          width: 50%;
        }

        /* ayat */
        .ayat-section .ayat-content p {
          padding-top: 0;
          padding-left: 70px;
          padding-right: 70px;
        }
        /* amplop */
        .amplop-section .section-paragraf p{
          padding: 0 10px;
        }
        .amplop-section .bank{
            flex: 0 0 100%;
            max-width: 100%;
        
        }
        .amplop-section .bank img{
          width: 50%;
        }
        .norek-copy{
          margin-top: 50px;
        }
        /* galeri */
        .gallery-section .gallery-item {
            flex: 100%;
            max-width: 100%;
            
        }
        .gallery-popup img.gp-img {
            width: auto;
            height: auto;
            max-width: 80%;
            padding-left: 95px;
        }
        .gallery-popup .gp-counter {
            left: 50px;
        }
        .gallery-popup .gp-close {
            right: 50px;
        }
        /* ucapan */
        .ucapan-section .form{
          margin-left: 20px;
          margin-right: 20px;
        }
        /*footer*/
        .footer .footer-content .couple-name {
            width: 300px;
            height: 300px;
        }
        .footer .footer-content .couple-name h2{
        font-size: 30px;
        }
    }

  </style>
</head>
<body>
  
  <script>
    var music = new Audio();

    music.addEventListener("load", function() {
      music.play();
    }, true);

    music.src = "./itsyou.mp3";
    music.loop = true;
    music.autoplay = true;
  
  </script>

<!-- HEADER START -->
<header class="header">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="logo">
        <a href="index.html">Nikah Yuk</a>
      </div>
      <div class="hamburger-btn">
        <span></span>
      </div>
      <div class="nav">
        <ul>
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="#couple">Couple</a></li>
          <li><a href="#acara">Acara</a></li>
          <li><a href="#gallery">Galeri</a></li>
          <li><a href="#ucapan">Ucapan</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>  
<!-- HEADER END-->

<!-- HOME SECTION START -->
<section class="home-section" id="home">
  <!-- SLIDE START -->
  <div class="slide active" style="background-image: url('../../file_pesananuser/fotoprewedd/<?php echo $row[32];?>');">
    <div class="container">
      <div class="row align-items-center">
        <div class="home-content">
          <p>We are Getting Married</p>
          <h1><?php echo $row[4];?> & <?php echo $row[5];?></h1>
          <span><?php echo $row[9];?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- SLIDE END -->
  <!-- SLIDE START -->
  <div class="slide" style="background-image: url('../../file_pesananuser/fotoprewedd/<?php echo $row[33];?>');">
    <div class="container">
      <div class="row align-items-center">
        <div class="home-content">
          <p>We are Getting Married</p>
          <h1><?php echo $row[4];?> & <?php echo $row[5];?></h1>
          <span><?php echo $row[9];?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- SLIDE END -->
  <!-- SLIDE START -->
  <div class="slide" style="background-image: url('../../file_pesananuser/fotoprewedd/<?php echo $row[32];?>');">
    <div class="container">
      <div class="row align-items-center">
        <div class="home-content">
          <p>We are Getting Married</p>
          <h1><?php echo $row[4];?> & <?php echo $row[5];?></h1>
          <span><?php echo $row[9];?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- SLIDE END -->
</section>
<!-- HOME SECTION END -->

<!-- COUPLE SECTION START -->
<section class="couple-section" id="couple">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h2>Happy Couple</h2>
      </div>
    </div>
    <div class="row">
      <div class="couple" >
        <img src="../../file_pesananuser/fotopengantinpria/<?php echo $row[34];?>" alt="happy couple">
        <h3><?php echo $row[4];?></h3>
        <p>Putra Kedua</p>
        <p>Bapak <?php echo $row[10];?> & Ibu <?php echo $row[11];?></p>
      </div>
      <div class="couple" >
        <i class="fa fa-heart"></i>
        <img src="../../file_pesananuser/fotopengantinwanita/<?php echo $row[35];?>" alt="happy couple">
        <h3></b><?php echo $row[5];?></h3>
        <p>Putri Pertama</p>
        <p>Bapak <?php echo $row[12];?> & Ibu <?php echo $row[13];?></p>
      </div>

    </div>
  </div>
</section>
<!-- COUPLE SECTION END -->

<!-- RESEPSI SECTION START -->
<section class="resepsi-section" id="acara">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h2>Akad & Resepsi Penikahan</h2>
      </div>
    </div>
    <div class="row">
      <div class="block1">
        <i class="fas fa-calendar fa-3x"></i>
        <p><?php echo $row[9];?></p>
      </div>
      <div class="block1">
        <i class="fas fa-clock fa-3x"></i>
        <p>Pukul <?php echo $row[8];?></p>
      </div>
    </div>
    <div class="row">
      <div class="block2">
        <i class="fas fa-map-marker fa-3x"></i>
        <p><?php echo $row[7];?></p>
      </div>
    </div>
  </div>
</section>
<!-- RESEPSI SECTION END -->

<!-- AYAT SECTION START -->
<section class="ayat-section">
  <div class="container">
    <div class="background" style="background-image: url('img/slides/ayat-background.png');">
    <div class="row">
      <div class="section-title">
        <h2 class="h2ayat">Ayat Kitab Suci</h2>
      </div>
    <div class="row">
      <div class="ayat-content">
        <p><?php echo $row[14];?></p>
      </div>
    </div>
    </div>
  </div>
</section>
<!-- AYAT SECTION END -->

<!-- AMPLOP SECTION START -->
<section class="amplop-section">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h2>Amplop Digital</h2>
      </div>
    </div>
    <div class="row">
      <div class="section-paragraf">
        <p>Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Dan jika memberi adalah ungkapan tanda kasih Anda, Anda dapat
         memberi kado secara cashless. </p>
      </div>
    </div>
    <div class="row">
      <div class="bank">
        <div class="norek-copy">
          <input type="text" class="text" value="<?php echo $row[19];?>">
          <button>
            <i class="fa fa-clone"></i>
          </button>
        </div>
        <div class="name-norek">
      
        </div>
      </div>
      <div class="bank">
        <div class="norek-copy">
          <input type="text" class="text" value="<?php echo $row[20];?>">
          <button>
            <i class="fa fa-clone"></i>
          </button>
        </div>
        <div class="name-norek">
         
        </div>
      </div>
    </div>
  </div>
</section>
<!-- AMPLOP SECTION END -->

<!-- GALLERY SECTION START-->
<section class="gallery-section" id="gallery">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h2>Galeri</h2>
      </div>
    </div>
    <div class="row">
      <!-- GALLERY ITEM START -->
      <div class="gallery-item">
        <div class="gallery-item-inner">
          <img src="../../file_pesananuser/fotogaleri/<?php echo $row[36];?>" data-large="../../file_pesananuser/fotogaleri/<?php echo $row[36];?>" alt="couple gallery">
        </div>
      </div>
      <!-- GALLERY ITEM END -->
      <!-- GALLERY ITEM START -->
      <div class="gallery-item">
        <div class="gallery-item-inner">
          <img src="../../file_pesananuser/fotogaleri/<?php echo $row[37];?>" data-large="../../file_pesananuser/fotogaleri/<?php echo $row[37];?>" alt="couple gallery">
        </div>
      </div>
      <!-- GALLERY ITEM END -->
      <!-- GALLERY ITEM START -->
      <div class="gallery-item">
        <div class="gallery-item-inner">
          <img src="../../file_pesananuser/fotogaleri/<?php echo $row[38];?>" data-large="../../file_pesananuser/fotogaleri/<?php echo $row[38];?>" alt="couple gallery">
        </div>
      </div>
      <!-- GALLERY ITEM END -->
      <!-- GALLERY ITEM START -->
      <div class="gallery-item">
        <div class="gallery-item-inner">
          <img src="../../file_pesananuser/fotogaleri/<?php echo $row[39];?>" data-large="../../file_pesananuser/fotogaleri/<?php echo $row[39];?>" alt="couple gallery">
        </div>
      </div>
      <!-- GALLERY ITEM END -->
      <!-- GALLERY ITEM START -->
      <div class="gallery-item">
        <div class="gallery-item-inner">
          <img src="../../file_pesananuser/fotoprewedd/<?php echo $row[33];?>" data-large="../../file_pesananuser/fotoprewedd/<?php echo $row[33];?>" alt="couple gallery">
        </div>
      </div>
      <!-- GALLERY ITEM END -->
      <!-- GALLERY ITEM START -->
      <div class="gallery-item">
        <div class="gallery-item-inner">
          <img src="../../file_pesananuser/fotoprewedd/<?php echo $row[32];?>" data-large="../../file_pesananuser/fotoprewedd/<?php echo $row[32];?>" alt="couple gallery">
        </div>
      </div>
      <!-- GALLERY ITEM END -->
    </div>
  </div>
</section>
<!-- GALLERY SECTION END-->

<!-- UCAPAN SECTION START -->
<section class="ucapan-section" id="ucapan">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h2>Kirim Ucapan & Doa Restu</h2>
      </div>
    </div>
    <div class="row">
      <div class="ucapan-form">
        <form class="form" action="proses.php" method="POST">
          <div class="row">
            <div class="input-group">
              <label>Nama</label>
              <input type="text" placeholder="Nama Lengkap" class="input-control">
            </div>  
          </div>
          
          <div class="row">
            <div class="input-group">
              <label>Ucapan</label>
              <textarea placeholder="Tulis Ucapan" class="input-control"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="input-group">
              <button type="submit" class="btn-1">Kirim</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
  </div>
</section>
<!-- UCAPAN SECTION END -->

<!-- TAMPILAN UCAPAN SECTION START  -->

<!-- TAMPILAN UCAPAN SECTION END  -->

<!-- FOOTER START -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="footer-content">
        <div class="couple-name">
          <img src="img/flower-circle.png" alt="Wedding Couple">
          <h2><?php echo $row[4];?>
            <span>&</span>
            <?php echo $row[5];?>
          </h2>
        </div>
        <p>Thank You</p>
      </div>
    </div>
  </div>
</footer>
<!-- FOOTER END -->

<!-- COPYRIGHT START -->
<p class="copyright-text">copyright &copy; 2023 NikahYuk</p>
<!-- COPYRIGHT END -->

<!-- GALLERY POPUP START -->
<div class="gallery-popup">
  <div class="gp-container">
    <div class="gp-counter"></div>
    <div class="gp-close">&times;</div>
    <img src="img/gallery/large/1.jpg" class="gp-img" alt="gallery img">
    <div class="gp-controls">
      <div class="prev">
        <i class="fas fa-angle-left"></i>
      </div>
      <div class="next">
        <i class="fas fa-angle-right"></i>
      </div>
    </div>
  </div>
</div>
<!-- GALLERY POPUP END -->

<!-- FOOTER2 START -->


  </div>
</footer>

<!-- JQUERY -->
<script src="js/jquery.min.js"></script>
<!-- SCROLLIT -->
<!-- <script src="scrollIt.min.js"></script> -->
<!-- MAIN -->
<script src="js/main.js"></script>
</body>
</html>

<?php
    } else {
        echo "No data found for the given ID.";
    }
}
?>
