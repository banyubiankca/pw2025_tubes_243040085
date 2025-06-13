<?php

// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'pw2025_tubes_243040085');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query awal
$makanan = "SELECT 
              makanan.id_makanan,
              makanan.nama_makanan,
              makanan.kategori, makanan.gambar,
              harga.harga
           FROM harga
           JOIN makanan ON harga.id_makanan = makanan.id_makanan";

$result = $conn->query($makanan);

// Ubah datanya ke dalam array
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
$menu = $rows; 

// Fungsi umum untuk query
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn) . "<br>Query: " . $query);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Tambah makanan
function tambahMakanan($data) {
    global $conn;

    $nama = htmlspecialchars($data['nama_makanan']);
    $kategori = htmlspecialchars($data['kategori']);
    $harga = htmlspecialchars($data['harga']);

    // Upload gambar
    $namaFile = $_FILES['gambar']['name'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Validasi: jika file tidak dipilih
    if (!$tmpName) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // Pindahkan gambar ke folder img/
    $uploadDir = 'img/';
    $gambar = uniqid() . '_' . $namaFile; // nama unik agar tidak bentrok
    move_uploaded_file($tmpName, $uploadDir . $gambar);

    // Simpan ke database
    $conn->query("INSERT INTO makanan (nama_makanan, kategori, gambar) VALUES ('$nama', '$kategori', '$gambar')");
    $id_makanan = $conn->insert_id;

    $conn->query("INSERT INTO harga (id_makanan, harga) VALUES ($id_makanan, '$harga')");

    return $id_makanan;
}


// Ambil semua data makanan
function getAllMakanan($conn) {
    $sql = "SELECT m.id_makanan, m.nama_makanan, m.kategori, r.harga, m.gambar
            FROM makanan m 
            LEFT JOIN harga r ON m.id_makanan = r.id_makanan";
    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

// edit data makanan
function editMakanan($data) {
    global $conn;

    $id = intval($data['id_makanan']);
    $nama = htmlspecialchars($data['nama_makanan']);
    $kategori = htmlspecialchars($data['kategori']);
    $harga = htmlspecialchars($data['harga']);

    if ($id <= 0) {
        echo "<script>alert('ID tidak valid!');</script>";
        return 0;
    }

    // Ambil gambar lama
    $res = $conn->query("SELECT gambar FROM makanan WHERE id_makanan = $id");
    if (!$res || $res->num_rows == 0) {
        echo "<script>alert('Data tidak ditemukan di DB!');</script>";
        return 0;
    }
    $row = $res->fetch_assoc();
    $gambarLama = $row['gambar'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $namaFile = $_FILES['gambar']['name'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($ext, $allowed_ext)) {
            echo "<script>alert('Format gambar tidak valid!');</script>";
            return 0;
        }

        if ($_FILES['gambar']['size'] > 2000000) {
            echo "<script>alert('Ukuran gambar terlalu besar! Maks 2MB');</script>";
            return 0;
        }

        if (file_exists('img/' . $gambarLama)) {
            unlink('img/' . $gambarLama);
        }

        $gambarBaru = uniqid() . '_' . $namaFile;
        move_uploaded_file($tmpName, 'img/' . $gambarBaru);
        $gambar = $gambarBaru;
    }

    $sql1 = "UPDATE makanan SET nama_makanan = '$nama', kategori = '$kategori', gambar = '$gambar' WHERE id_makanan = $id";
    $sql2 = "UPDATE harga SET harga = '$harga' WHERE id_makanan = $id";

    echo "<pre>$sql1</pre>";
    echo "<pre>$sql2</pre>";

    if (
        $conn->query($sql1) &&
        $conn->query($sql2)
    ) {
        return 1;
    } else {
        echo "<script>alert('Error SQL: " . $conn->error . "');</script>";
        return 0;
    }
}



// Hapus makanan
function hapusMakanan($conn, $mn) {
    $mn = intval($mn);

    $conn->query("DELETE FROM harga WHERE id_makanan = $mn") or die(mysqli_error($conn));
    $conn->query("DELETE FROM makanan WHERE id_makanan = $mn") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

// Search makanan
function search($keyword){
    global $conn;

    $keyword = mysqli_real_escape_string($conn, $keyword);

    $query = "SELECT m.id_makanan, m.nama_makanan, m.kategori, h.harga
              FROM makanan m
              LEFT JOIN harga h ON h.id_makanan = m.id_makanan
              WHERE m.nama_makanan LIKE '%$keyword%' 
              OR m.kategori LIKE '%$keyword%'";

    return query($query);
}

// huruf kapital
function capitalizeWords($string) {
  return ucwords(strtolower($string));
}

$menu = query("SELECT m.id_makanan, m.nama_makanan, m.kategori, h.harga,m.gambar
                  FROM makanan m
                  LEFT JOIN harga h ON h.id_makanan = m.id_makanan");

        if( isset($_POST["search"]) ){
         $menu = search($_POST["keyword"]);
}


?>
