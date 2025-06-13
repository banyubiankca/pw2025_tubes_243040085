<?php
require 'functions.php';
require 'partials/header.php';

// Cek apakah ID dikirim
if (!isset($_GET['id_makanan'])) {
    echo "<script>
            alert('Data tidak ditemukan!');
            document.location.href = 'admin.php';
          </script>";
    exit;
}

$id = intval($_GET['id_makanan']);

// Ambil data makanan + harga
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

// Proses update
if (isset($_POST['edit'])) {
    if (editMakanan($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diupdate!');
                document.location.href = 'admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diupdate!');
              </script>";
    }
}
?>

<a href="admin.php" class="btn btn-outline-danger back-link"><b><i class="bi bi-backspace">Back</i></a>

<form action="" method="post" enctype="multipart/form-data">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <input type="hidden" name="id_makanan" value="<?= $menu['id_makanan']; ?>">
                <h1 class="mb-3 miskan">Edit Menu</h1>

                <div class="mb-3 geosan">
                    <label>Nama Makanan</label>
                    <input type="text" class="form-control" name="nama_makanan" value="<?= htmlspecialchars($menu['nama_makanan']); ?>" required>
                </div>

                <div class="mb-3 geosan"> 
                    <label>Kategori</label>
                    <input type="text" class="form-control" name="kategori" value="<?= htmlspecialchars($menu['kategori']); ?>" required>
                </div>

                <div class="mb-3 geosan">
                <label for="harga" class="form-label geosan">Harga</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="harga" value="<?= htmlspecialchars($menu['harga']); ?>" required>
                </div>
                </div>

                <div class="mb-3 geosan">
                <label>Gambar Saat Ini</label><br>
                    <img src="img/<?= htmlspecialchars($menu['gambar']); ?>" width="100"><br>
                </div>

                <div class="mb-3 geosan">
                    <label>Ganti Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                </div>

                <div class="mb-3 geosan">
                <button type="submit" name="edit" class="btn btn-primary">Update</button>
                    <a href="admin.php" class="btn btn-secondary">Batal</a>
                </div>
            </div>
            </div>
        </div>
        </form>
