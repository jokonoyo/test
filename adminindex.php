<?php
session_start();
if(!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("refresh:3;url=login.php");
    echo "<p>Anda belum login sebagai admin.</p>";
    die();
}
?>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./asetdashboard/logo.png" type="image/x-icon" />

    <style>
    * {
        font-family: 'Inter', sans-serif;
    }

    h1 {
        display: block;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1.5rem;
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #0a405e;
        color: #fff;
        transition: 0.4s ease-in-out;
        text-align: center;
    }

    th:hover {
        background-color: #93b9d8;
    }

    td {
        font-size: 13px;
    }

    .keluar {
        color: red;
        background-color: #93b9d8;
        text-decoration: none;
        font-size: 20px;
        margin-bottom: 1rem;
        margin-left: 2rem;
        padding: 8px 16px;
        border-radius: 1.5rem;
        transition: 0.3s ease-in-out;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.15), 5px 5px 5px rgba(0, 0, 0, 0.15);
    }

    .keluar:hover {
        color: #fff;
        background-color: #0a405e;
    }

    .edit {
        text-decoration: none;
        color: #ff849c;
        transition: 0.3s ease-in-out;
        padding: 1px 2px;
    }

    .edit:hover {
        color: #fff;
        background-color: #0a405e;
    }

    button {
        border: none;
        cursor: pointer;
        color: #ff849c;
        transition: 0.3s ease-in-out;
        padding: 1px 2px;
        margin-left: 1rem;
        margin-top: 1rem;
    }

    button:hover {
        color: #fff;
        background-color: #0a405e;
    }

    .bayar {
        width: 120px;
        height: 120px;
        transition: 0.3s ease-in-out;
    }

    #modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 50px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.9);
    }

    #modalImage {
        display: block;
        margin: 0 auto;
        max-width: 90%;
        max-height: 90%;
    }

    .close {
        color: #fff;
        position: absolute;
        top: 15px;
        right: 35px;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;

    }



    @media only screen and (max-width: 600px) {
        table {
            font-size: 12px;
        }

        th,
        td {
            padding: 5px;
        }

    }
    </style>
</head>

<body>
    <h1>Data Pemesanan Undangan Digital</h1>
    <a class="keluar" href="logout.php">Keluar</a>

    <table>
        <tr>
            <th>No.</th>
            <th>Email</th>
            <th>Waktu Pemesanan</th>
            <th>Type Desain</th>
            <th>Detail Informasi Acara</th>
            <th>Waktu Pembayaran</th>
            <th>Bukti Pembayaran</th>
            <th>Status Pembayaran</th>
            <th>Status Pesanan</th>
        </tr>
        <?php 
                require_once "config.php";

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
                                pesanan.id_desain
                FROM users
                JOIN pesanan ON users.id = pesanan.iduser
                JOIN pembayaran ON users.id = pembayaran.iduser
                JOIN desain ON pesanan.id_desain = desain.id_desain
                ORDER BY pesanan.id_pesanan DESC";

                    $result = mysqli_query($conn, $sql);
                    $nomor = 0;
                    while ($row = mysqli_fetch_array($result)){
                        $nomor++;
                        ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $row[0]?></td>
            <td><?php echo $row[1]?></td>
            <td>
                <?php echo $row[31]?>
                <?php if ($row[31] == 1): ?>
                <a class="edit" href="desainundangan/desain1/editinvitation1.php?id=<?php echo $row[2]; ?>"
                    class="edit">Lihat</a>
                <?php elseif ($row[31] == 2): ?>
                <a target="_blank" class="edit" href="desainundangan/desain2/index.php?id= <?php echo $row[2]; ?>"
                    class="edit">Lihat</a>
                <?php elseif ($row[31] == 3): ?>
                <a class="edit" href="desainundangan/desain3/index.php?id=<?php echo $row[2]; ?>" class="edit">Lihat</a>
                <?php endif; ?>

            </td>
            <td>
                <b>Nama Pengantin Pria : </b><?php echo $row[4];?><br />
                <b>Nama Pengantin Wanita : </b><?php echo $row[5];?><br />
                <b>Nomor HP : </b><?php echo $row[6];?><br />
                <b>Lokasi Acara : </b><?php echo $row[7];?><br />
                <b>Waktu Acara</b><?php echo $row[8];?><br />
                <b>Tanggal Acara : </b><?php echo $row[9];?><br />
                <b>Nama Ayah Pengantin Pria : </b><?php echo $row[10];?><br />
                <b>Nama Ibu Pengantin Pria : </b><?php echo $row[11];?><br />
                <b>Nama Ayah Pengantin Wanita : </b><?php echo $row[12];?><br />
                <b>Nama Ibu Pengantin Wanita : </b><?php echo $row[13];?><br />
                <b>Ayat Kitab Suci : </b><?php echo $row[14];?><br />
                <b>Foto Pengantin Pria : </b><?php echo $row[15];?><br />
                <b>Foto Pengantin Wanita : </b><?php echo $row[16];?><br />
                <b>Foto Prewedd : </b><?php echo $row[17];?> <?php echo $row[27];?><br />
                <b>Foto Galeri : </b><?php echo $row[18];?> <?php echo $row[28];?> <?php echo $row[29];?><br />
                <b>Norek Pengantin Pria : </b><?php echo $row[19];?><br />
                <b>Norek Pengantin Wanita : </b><?php echo $row[20];?><br />
                <b>Lagu : </b><?php echo $row[21];?>
            </td>
            <td><?php echo $row[23]?></td>
            <td>
                <img class="bayar" src="buktipembayaran/<?php echo $row[24]?>" alt="">
                <button onclick="showImage(this)">Lihat Detail</button>
            </td>
            <div id="modal">
                <span class="close" onclick="hideImage()">&times;</span>
                <img id="modalImage" src="" alt="">
            </div>
            <td>
                <?php echo $row[25]?>
                <a class="edit" href="editstatuspembayaran.php?id=<?php echo $row[26]; ?>" class="edit">Edit</a>
            </td>
            <td>
                <b>Status Pesanan :</b><?php echo $row[22]?><br />
                <b>Link Undangan :</b><?php echo $row[30]?>
                <a class="edit" href="editstatuspesanan.php?id=<?php echo $row[2]; ?>" class="edit">Edit</a>
            </td>
        </tr>
        <?php
                    }
            ?>
    </table>

    <script>
    function showImage(button) {
        var modal = document.getElementById("modal");
        var modalImage = document.getElementById("modalImage");
        var thumbnail = button.previousElementSibling;

        modal.style.display = "block";
        modalImage.src = thumbnail.src;

        document.body.style.overflow = "hidden"; // Prevent scrolling when modal is open
    }

    function hideImage() {
        var modal = document.getElementById("modal");

        modal.style.display = "none";
        document.body.style.overflow = "auto"; // Enable scrolling when modal is closed
    }
    </script>
</body>

</html>