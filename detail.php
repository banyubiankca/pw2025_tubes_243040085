<?php
require 'functions.php';
require 'partials/header.php';

// Cek apakah ID dikirim melalui URL
if (!isset($_GET['id_makanan'])) {
    echo "<script>
            alert('Data tidak ditemukan!');
            document.location.href = 'admin.php';
          </script>";
    exit;
}

$id = intval($_GET['id_makanan']); // pastikan sesuai nama parameternya

// Ambil data dari tabel makanan + harga
$data = query("SELECT m.*, h.harga 
               FROM makanan m 
               LEFT JOIN harga h ON h.id_makanan = m.id_makanan 
               WHERE m.id_makanan = $id");

if (empty($data)) {
    echo "<script>
            alert('Data tidak ditemukan di database!');
            document.location.href = 'admin.php';
          </script>";
    exit;
}

$menu = $data[0];
$hargaBersih = preg_replace('/[^\d]/', '', $menu['harga']); 
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Menu</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<a href="admin.php" class="btn btn-outline-danger back-link"><b><i class="bi bi-backspace">Back</i></a>

<div class="container full-center geosan uk-dt">
  <div class="detail-card text-center">
    <h2 class="mb-3"><b><?= htmlspecialchars($menu['nama_makanan']) ?></b></h2>
    <p><strong>Kategori:</strong> <?= htmlspecialchars($menu['kategori']) ?></p>
    <p><strong>Harga:</strong> Rp<?= number_format((int)preg_replace('/[^\d]/', '', $menu['harga']), 0, ',', '.') ?></p>
    <p><strong>Gambar:</strong></p>
    <img src="img/<?= htmlspecialchars($menu['gambar']) ?>" alt="<?= htmlspecialchars($menu['nama_makanan']) ?>">
  </div>
</div>

</body>
</html>
