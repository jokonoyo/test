<?php
// proseseditpembayaran.php

// Periksa apakah parameter 'id' telah diteruskan melalui URL
if (isset($_GET['id'])) {
    // Simpan id dari parameter URL ke dalam variabel $id
    $id = $_GET['id'];

    // Periksa apakah form telah disubmit
    if (isset($_POST['submit'])) {
        // Simpan status pembayaran yang diterima dari form ke dalam variabel $status_pembayaran
        $status_pembayaran = $_POST['status_pembayaran'];

        // Simpan status pembayaran baru ke dalam database atau melakukan pemrosesan lain yang diperlukan
        // ...

        // Redirect kembali ke halaman sebelumnya dengan menyertakan parameter 'id' untuk mengedit pembayaran yang sama
        header("Location: editpembayaran.php?id=$id");
        exit();
    } else {
        // Jika form belum disubmit, dapatkan status pembayaran terakhir dari database atau sumber data lainnya
        require_once "config.php";
        $sql = "SELECT status_pembayaran FROM pembayaran WHERE id_pembayaran = $id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);
        $status_pembayaran_terakhir = $data['status_pembayaran'];

        // Tampilkan form dengan status pembayaran terakhir sebagai opsi yang dipilih secara default
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

    input {
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

    input:hover {
        background-color: #fddbe7;
        color: #0f025f;
    }
    </style>
</head>

<body>
    <h1>Status pembayaran</h1>
    <form action="proseseditpembayaran.php?id=<?php echo $id ?>" method="POST">
        <label for="status_pembayaran">Status Pemesanan :</label>
        <select name="status_pembayaran" id="status_pembayaran">
            <option value="Belum Terverifikasi"
                <?php if ($status_pembayaran_terakhir == "Belum Terverifikasi") echo "selected"; ?>>Belum Terverifikasi
            </option>
            <option value="Lunas" <?php if ($status_pembayaran_terakhir == "Lunas") echo "selected"; ?>>Lunas</option>
        </select> <br>

        <input type="submit" name="submit" value="Simpan">
    </form>
    <?php
    }
} else {
    // Jika parameter 'id' tidak ditemukan dalam URL, tampilkan pesan error atau redirect ke halaman yang sesuai
    echo "ID pembayaran tidak valid.";
}
?>
</body>