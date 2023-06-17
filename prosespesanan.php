<?php
include "ceklogin.php";
require_once "config.php";

// nama_pengantin_pria
if (!isset($_POST['nama_pengantin_pria']) || empty($_POST['nama_pengantin_pria'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}

// nama_pengantin_wanita
if (!isset($_POST['nama_pengantin_wanita']) || empty($_POST['nama_pengantin_wanita'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}

// nomor_hp
if (!isset($_POST['nomor_hp']) || empty($_POST['nomor_hp'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}

// lokasi_acara
if (!isset($_POST['lokasi_acara']) || empty($_POST['lokasi_acara'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}

// waktu_acara
if (!isset($_POST['waktu_acara']) || empty($_POST['waktu_acara'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}

// tanggal_acara
if (!isset($_POST['tanggal_acara']) || empty($_POST['tanggal_acara'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}

// tanggal_acara
if (!isset($_POST['tanggal_acara']) || empty($_POST['tanggal_acara'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}
// nama_ayah_pengantin_pria
if (!isset($_POST['nama_ayah_pengantin_pria']) || empty($_POST['nama_ayah_pengantin_pria'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}
// nama_ayah_pengantin_pria
if (!isset($_POST['nama_ayah_pengantin_pria']) || empty($_POST['nama_ayah_pengantin_pria'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}
// nama_ibu_pengantin_pria
if (!isset($_POST['nama_ibu_pengantin_pria']) || empty($_POST['nama_ibu_pengantin_pria'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}
// nama_ayah_pengantin_wanita
if (!isset($_POST['nama_ayah_pengantin_wanita']) || empty($_POST['nama_ayah_pengantin_wanita'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}
// nama_ayah_pengantin_wanita
if (!isset($_POST['nama_ayah_pengantin_wanita']) || empty($_POST['nama_ayah_pengantin_wanita'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}
// nama_ibu_pengantin_wanita
if (!isset($_POST['nama_ibu_pengantin_wanita']) || empty($_POST['nama_ibu_pengantin_wanita'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}
// ayat_kitab_suci
if (!isset($_POST['ayat_kitab_suci']) || empty($_POST['ayat_kitab_suci'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}
// foto pengantin pria
if (!isset($_FILES['foto_pengantin_pria']) || $_FILES['foto_pengantin_pria']['error'] !== 0) {
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
} else {
    $tmp_name = $_FILES['foto_pengantin_pria']['tmp_name'];
    $file_name = $_FILES['foto_pengantin_pria']['name'];
    $destination_folder = 'file_pesananuser/fotopengantinpria/';
    $destination = $destination_folder . $file_name;

    // Cek apakah file dengan nama yang sama sudah ada di folder tujuan
    if (file_exists($destination)) {
        $path_parts = pathinfo($file_name);
        $extension = $path_parts['extension'];
        $file_name_without_ext = $path_parts['filename'];

        $counter = 1;
        while (file_exists($destination)) {
            // Tambahkan angka increment ke nama file
            $new_file_name = $file_name_without_ext . '_' . $counter . '.' . $extension;
            $destination = $destination_folder . $new_file_name;
            $counter++;
        }

        // Pindahkan file yang diupload ke tujuan dengan nama baru yang sudah ditambahkan increment
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_pengantin_pria_name = $new_file_name; // Simpan nama file baru dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    } else {
        // Pindahkan file yang diupload ke tujuan tanpa perubahan nama
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_pengantin_pria_name = $file_name; // Simpan nama file dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    }
}
// foto pengantin wanita
if (!isset($_FILES['foto_pengantin_wanita']) || $_FILES['foto_pengantin_wanita']['error'] !== 0) {
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
} else {
    $tmp_name = $_FILES['foto_pengantin_wanita']['tmp_name'];
    $file_name = $_FILES['foto_pengantin_wanita']['name'];
    $destination_folder = 'file_pesananuser/fotopengantinwanita/';
    $destination = $destination_folder . $file_name;

    // Cek apakah file dengan nama yang sama sudah ada di folder tujuan
    if (file_exists($destination)) {
        $path_parts = pathinfo($file_name);
        $extension = $path_parts['extension'];
        $file_name_without_ext = $path_parts['filename'];

        $counter = 1;
        while (file_exists($destination)) {
            // Tambahkan angka increment ke nama file
            $new_file_name = $file_name_without_ext . '_' . $counter . '.' . $extension;
            $destination = $destination_folder . $new_file_name;
            $counter++;
        }

        // Pindahkan file yang diupload ke tujuan dengan nama baru yang sudah ditambahkan increment
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_pengantin_wanita_name = $new_file_name; // Simpan nama file baru dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    } else {
        // Pindahkan file yang diupload ke tujuan tanpa perubahan nama
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_pengantin_wanita_name = $file_name; // Simpan nama file dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    }
}
// Unggah foto prewedding 1
if (!isset($_FILES['foto_prewedd_satu']) || $_FILES['foto_prewedd_satu']['error'] !== 0) {
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
} else {
    $tmp_name = $_FILES['foto_prewedd_satu']['tmp_name'];
    $file_name = $_FILES['foto_prewedd_satu']['name'];
    $destination_folder = 'file_pesananuser/fotoprewedd/';
    $destination = $destination_folder . $file_name;

    // Cek apakah file dengan nama yang sama sudah ada di folder tujuan
    if (file_exists($destination)) {
        $path_parts = pathinfo($file_name);
        $extension = $path_parts['extension'];
        $file_name_without_ext = $path_parts['filename'];

        $counter = 1;
        while (file_exists($destination)) {
            // Tambahkan angka increment ke nama file
            $new_file_name = $file_name_without_ext . '_' . $counter . '.' . $extension;
            $destination = $destination_folder . $new_file_name;
            $counter++;
        }

        // Pindahkan file yang diupload ke tujuan dengan nama baru yang sudah ditambahkan increment
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_prewedd_satu_name = $new_file_name; // Simpan nama file baru dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    } else {
        // Pindahkan file yang diupload ke tujuan tanpa perubahan nama
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_prewedd_satu_name = $file_name; // Simpan nama file dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    }
}
// Unggah foto prewedding 2
if (!isset($_FILES['foto_prewedd_dua']) || $_FILES['foto_prewedd_dua']['error'] !== 0) {
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
} else {
    $tmp_name = $_FILES['foto_prewedd_dua']['tmp_name'];
    $file_name = $_FILES['foto_prewedd_dua']['name'];
    $destination_folder = 'file_pesananuser/fotoprewedd/';
    $destination = $destination_folder . $file_name;

    // Cek apakah file dengan nama yang sama sudah ada di folder tujuan
    if (file_exists($destination)) {
        $path_parts = pathinfo($file_name);
        $extension = $path_parts['extension'];
        $file_name_without_ext = $path_parts['filename'];

        $counter = 1;
        while (file_exists($destination)) {
            // Tambahkan angka increment ke nama file
            $new_file_name = $file_name_without_ext . '_' . $counter . '.' . $extension;
            $destination = $destination_folder . $new_file_name;
            $counter++;
        }

        // Pindahkan file yang diupload ke tujuan dengan nama baru yang sudah ditambahkan increment
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_prewedd_dua_name = $new_file_name; // Simpan nama file baru dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    } else {
        // Pindahkan file yang diupload ke tujuan tanpa perubahan nama
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_prewedd_dua_name = $file_name; // Simpan nama file dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    }
}
// Unggah foto galeri 1
if (!isset($_FILES['foto_galeri_satu']) || $_FILES['foto_galeri_satu']['error'] !== 0) {
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
} else {
    $tmp_name = $_FILES['foto_galeri_satu']['tmp_name'];
    $file_name = $_FILES['foto_galeri_satu']['name'];
    $destination_folder = 'file_pesananuser/fotogaleri/';
    $destination = $destination_folder . $file_name;

    // Cek apakah file dengan nama yang sama sudah ada di folder tujuan
    if (file_exists($destination)) {
        $path_parts = pathinfo($file_name);
        $extension = $path_parts['extension'];
        $file_name_without_ext = $path_parts['filename'];

        $counter = 1;
        while (file_exists($destination)) {
            // Tambahkan angka increment ke nama file
            $new_file_name = $file_name_without_ext . '_' . $counter . '.' . $extension;
            $destination = $destination_folder . $new_file_name;
            $counter++;
        }

        // Pindahkan file yang diupload ke tujuan dengan nama baru yang sudah ditambahkan increment
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_galeri_satu_name = $new_file_name; // Simpan nama file baru dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    } else {
        // Pindahkan file yang diupload ke tujuan tanpa perubahan nama
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_galeri_satu_name = $file_name; // Simpan nama file dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    }
}
// Unggah foto galeri 2
if (!isset($_FILES['foto_galeri_dua']) || $_FILES['foto_galeri_dua']['error'] !== 0) {
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
} else {
    $tmp_name = $_FILES['foto_galeri_dua']['tmp_name'];
    $file_name = $_FILES['foto_galeri_dua']['name'];
    $destination_folder = 'file_pesananuser/fotogaleri/';
    $destination = $destination_folder . $file_name;

    // Cek apakah file dengan nama yang sama sudah ada di folder tujuan
    if (file_exists($destination)) {
        $path_parts = pathinfo($file_name);
        $extension = $path_parts['extension'];
        $file_name_without_ext = $path_parts['filename'];

        $counter = 1;
        while (file_exists($destination)) {
            // Tambahkan angka increment ke nama file
            $new_file_name = $file_name_without_ext . '_' . $counter . '.' . $extension;
            $destination = $destination_folder . $new_file_name;
            $counter++;
        }

        // Pindahkan file yang diupload ke tujuan dengan nama baru yang sudah ditambahkan increment
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_galeri_dua_name = $new_file_name; // Simpan nama file baru dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    } else {
        // Pindahkan file yang diupload ke tujuan tanpa perubahan nama
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_galeri_dua_name = $file_name; // Simpan nama file dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    }
}
// Unggah foto galeri 3
if (!isset($_FILES['foto_galeri_tiga']) || $_FILES['foto_galeri_tiga']['error'] !== 0) {
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
} else {
    $tmp_name = $_FILES['foto_galeri_tiga']['tmp_name'];
    $file_name = $_FILES['foto_galeri_tiga']['name'];
    $destination_folder = 'file_pesananuser/fotogaleri/';
    $destination = $destination_folder . $file_name;

    // Cek apakah file dengan nama yang sama sudah ada di folder tujuan
    if (file_exists($destination)) {
        $path_parts = pathinfo($file_name);
        $extension = $path_parts['extension'];
        $file_name_without_ext = $path_parts['filename'];

        $counter = 1;
        while (file_exists($destination)) {
            // Tambahkan angka increment ke nama file
            $new_file_name = $file_name_without_ext . '_' . $counter . '.' . $extension;
            $destination = $destination_folder . $new_file_name;
            $counter++;
        }

        // Pindahkan file yang diupload ke tujuan dengan nama baru yang sudah ditambahkan increment
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_galeri_tiga_name = $new_file_name; // Simpan nama file baru dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    } else {
        // Pindahkan file yang diupload ke tujuan tanpa perubahan nama
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_galeri_tiga_name = $file_name; // Simpan nama file dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    }
}
// Unggah foto galeri 4
if (!isset($_FILES['foto_galeri_empat']) || $_FILES['foto_galeri_empat']['error'] !== 0) {
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
} else {
    $tmp_name = $_FILES['foto_galeri_empat']['tmp_name'];
    $file_name = $_FILES['foto_galeri_empat']['name'];
    $destination_folder = 'file_pesananuser/fotogaleri/';
    $destination = $destination_folder . $file_name;

    // Cek apakah file dengan nama yang sama sudah ada di folder tujuan
    if (file_exists($destination)) {
        $path_parts = pathinfo($file_name);
        $extension = $path_parts['extension'];
        $file_name_without_ext = $path_parts['filename'];

        $counter = 1;
        while (file_exists($destination)) {
            // Tambahkan angka increment ke nama file
            $new_file_name = $file_name_without_ext . '_' . $counter . '.' . $extension;
            $destination = $destination_folder . $new_file_name;
            $counter++;
        }

        // Pindahkan file yang diupload ke tujuan dengan nama baru yang sudah ditambahkan increment
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_galeri_empat_name = $new_file_name; // Simpan nama file baru dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    } else {
        // Pindahkan file yang diupload ke tujuan tanpa perubahan nama
        if (move_uploaded_file($tmp_name, $destination)) {
            $foto_galeri_empat_name = $file_name; // Simpan nama file dalam variabel yang sesuai
        } else {
            // Gagal mengunggah file
        }
    }
}


// norek pengantin pria
if (!isset($_POST['norek_pengantin_pria']) || empty($_POST['norek_pengantin_pria'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}
// norek pengantin wanita
if (!isset($_POST['norek_pengantin_wanita']) || empty($_POST['norek_pengantin_wanita'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}
// lagu
if (!isset($_POST['lagu']) || empty($_POST['lagu'])){
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}

$id_desain = $_POST['desain'];
$id_desain = mysqli_real_escape_string($conn, $id_desain);
$nama_pengantin_pria = mysqli_real_escape_string($conn, $_POST['nama_pengantin_pria']);
$nama_pengantin_wanita = mysqli_real_escape_string($conn, $_POST['nama_pengantin_wanita']);
$nomor_hp = mysqli_real_escape_string($conn, $_POST['nomor_hp']);
$lokasi_acara = mysqli_real_escape_string($conn, $_POST['lokasi_acara']);
$waktu_acara = mysqli_real_escape_string($conn, $_POST['waktu_acara']);
$tanggal_acara = mysqli_real_escape_string($conn, $_POST['tanggal_acara']);
$nama_ayah_pengantin_pria = mysqli_real_escape_string($conn, $_POST['nama_ayah_pengantin_pria']);
$nama_ibu_pengantin_pria = mysqli_real_escape_string($conn, $_POST['nama_ibu_pengantin_pria']);
$nama_ayah_pengantin_wanita = mysqli_real_escape_string($conn, $_POST['nama_ayah_pengantin_wanita']);
$nama_ibu_pengantin_wanita = mysqli_real_escape_string($conn, $_POST['nama_ibu_pengantin_wanita']);
$ayat_kitab_suci = mysqli_real_escape_string($conn, $_POST['ayat_kitab_suci']);
$norek_pengantin_pria= mysqli_real_escape_string($conn, $_POST['norek_pengantin_pria']);
$norek_pengantin_wanita = mysqli_real_escape_string($conn, $_POST['norek_pengantin_wanita']);
$lagu = mysqli_real_escape_string($conn, $_POST['lagu']);

// Siapkan query SQL untuk menyimpan data pesanan ke database
$sql =  "INSERT INTO pesanan (
    iduser,
    id_desain,
    nama_pengantin_pria,
    nama_pengantin_wanita,
    nomor_hp,
    lokasi_acara,
    waktu_acara,
    tanggal_acara,
    nama_ayah_pengantin_pria,
    nama_ibu_pengantin_pria,
    nama_ayah_pengantin_wanita,
    nama_ibu_pengantin_wanita,
    ayat_kitab_suci,
    foto_pengantin_pria,
    foto_pengantin_wanita,
    foto_prewedd_satu,
    foto_galeri_satu,
    norek_pengantin_pria,
    norek_pengantin_wanita,
    lagu,
    tanggal_pemesanan,
    foto_prewedd_dua,
    foto_galeri_dua,
    foto_galeri_tiga,
    foto_galeri_empat,
    linkundangan
) VALUES (
    '$_SESSION[iduser]',
    '$id_desain', 
    '$nama_pengantin_pria', 
    '$nama_pengantin_wanita', 
    '$nomor_hp', 
    '$lokasi_acara',
    '$waktu_acara',
    '$tanggal_acara',
    '$nama_ayah_pengantin_pria',
    '$nama_ibu_pengantin_pria',
    '$nama_ayah_pengantin_wanita',
    '$nama_ibu_pengantin_wanita',
    '$ayat_kitab_suci',
    '$foto_pengantin_pria_name',
    '$foto_pengantin_wanita_name',
    '$foto_prewedd_satu_name',
    '$foto_galeri_satu_name',
    '$norek_pengantin_pria',
    '$norek_pengantin_wanita',
    '$lagu',
    NOW(),
    '$foto_prewedd_dua_name',
    '$foto_galeri_dua_name',
    '$foto_galeri_tiga_name',
    '$foto_galeri_empat_name',
    'default_value'
)";

// Jalankan query SQL dan beri tanggapan sesuai hasilnya
if (mysqli_query($conn, $sql)) {
header("refresh:3;url=popupsukses.php");

} else {
echo "<p>Ups, data gagal disimpan:</p>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
    .loader-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .loader {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
    </style>
    <link rel="shortcut icon" href="./asetdashboard/logo.png" type="image/x-icon" />
</head>

<body>
    <div class="loader-container">
        <div class="loader"></div>
    </div>
</body>

</html>