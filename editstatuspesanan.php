<?php
// proseseditpesanan.php

// Periksa apakah parameter 'id' telah diteruskan melalui URL
if (isset($_GET['id'])) {
    // Simpan id dari parameter URL ke dalam variabel $id
    $id = $_GET['id'];

    // Periksa apakah form telah disubmit
    if (isset($_POST['submit'])) {
        // Simpan status pesanan yang diterima dari form ke dalam variabel $status_pesanan
        $status_pesanan = $_POST['status_pesanan'];

        // Simpan riwayat perubahan status pesanan ke dalam database atau melakukan pemrosesan lain yang diperlukan
        require_once "config.php";
        $sql = "INSERT INTO history_pesanan (id_pesanan, status_pesanan) VALUES ('$id', '$status_pesanan')";
        mysqli_query($conn, $sql);

        // Simpan status pesanan baru ke dalam database atau melakukan pemrosesan lain yang diperlukan
        $sql = "UPDATE pesanan SET status_pesanan='$status_pesanan' WHERE id_pesanan=$id";
        mysqli_query($conn, $sql);

        // Redirect kembali ke halaman sebelumnya dengan menyertakan parameter 'id' untuk mengedit pesanan yang sama
        header("Location: editpesanan.php?id=$id");
        exit();
    } else {
        // Jika form belum disubmit, dapatkan data pesanan dari database atau sumber data lainnya
        require_once "config.php";
        $sql = "SELECT status_pesanan FROM pesanan WHERE id_pesanan = $id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        $status_pesanan_terakhir = $data['status_pesanan'];

        // Tampilkan form dengan status pesanan terakhir sebagai opsi yang dipilih secara default
        ?>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
    <style>
    * {
        font-family: 'Inter', sans-serif;
    }

    h1 {
        color: #0f025f;
        font-size: 40px;
    }

    label {
        font-size: 20px;
    }

    .simpan {
        background-color: #ff849c;
        border: none #0f025f;
        font-size: 15px;
        cursor: pointer;
        padding: 8px 16px;
        margin-left: 1.5rem;
        margin-top: 1rem;
        border-radius: 1.5rem;
        transition: 0.4s ease-in-out;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.15), 5px 5px 5px rgba(0, 0, 0, 0.15);
    }

    .simpan:hover {
        background-color: #fddbe7;
        color: #0f025f;
    }
    </style>
</head>

<body>
    <h1>Status pesanan</h1>
    <form action="proseseditpesanan.php?id=<?php echo $id ?>" method="POST">
        <label for="status_pesanan">Status Pemesanan :</label>
        <select name="status_pesanan" id="status_pesanan">
            <option value="Dalam Proses" <?php if ($status_pesanan_terakhir == "Dalam Proses") echo "selected"; ?>>Dalam
                Proses</option>
            <option value="Selesai" <?php if ($status_pesanan_terakhir == "Selesai") echo "selected"; ?>>Selesai
            </option>
            <option value="Dibatalkan" <?php if ($status_pesanan_terakhir == "Dibatalkan") echo "selected"; ?>>
                Dibatalkan
            </option>
        </select>
        <br />
        <label for="linkundangan">Link Undangan :</label>
        <input name="linkundangan" id="linkundangan">
        <br />
        <input class="simpan" type="submit" name="submit" value="Simpan">
    </form>
    <?php
    }
} else {
    // Jika parameter 'id' tidak ditemukan dalam URL, tampilkan pesan error atau redirect ke halaman yang sesuai
    echo "ID pesanan tidak valid.";
}
?>
</body>