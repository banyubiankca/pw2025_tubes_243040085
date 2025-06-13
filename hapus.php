<?php
  require "functions.php";
  if (isset($_GET['id_makanan'])) {
    $mn = $_GET['id_makanan'];

    // Cek apakah id valid
    if (hapusMakanan($conn, $mn) > 0) {
      echo "<script>
              alert('Data berhasil dihapus!');
              document.location.href = 'admin.php';
            </script>";
    } else {
      echo "<script>
              alert('Data gagal dihapus!');
              document.location.href = 'admin.php';
            </script>";
    }
  } else {
    echo "<script>
            document.location.href = 'admin.php';
          </script>";
    }
      