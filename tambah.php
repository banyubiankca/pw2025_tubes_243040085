<?php
require 'functions.php';
require "partials/navbar2.php";
require "partials/header.php";

if (isset($_POST['submit'])) {

    $nama_makanan = capitalizeWords($_POST['nama_makanan']);
    $kategori     = capitalizeWords($_POST['kategori']);

    if (tambahMakanan($_POST) > 0) {
      echo "<script>
          alert('Data berhasil ditambahkan!');
          document.location.href = 'admin.php';
      </script>";
  } else {
      echo "<script>
          alert('Data gagal ditambahkan!');
          document.location.href = 'tambah.php';
      </script>";
  }
}

?>

<br>
<br>
<form action="tambah.php" method="POST" enctype="multipart/form-data">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="mb-3 miskan">Tambah Menu</h1>

        <div class="mb-3">
          <label for="nama" class="form-label geosan">Nama</label>
          <input type="text" class="form-control geosan uk-mn" id="nama" name="nama_makanan"
                 placeholder="Nama Makanan" autocomplete="off" required autofocus
                 oninput="capitalizeEachWord(this)" style="text-transform: capitalize;">
        </div>

        <div class="mb-3"> 
          <label for="kategori" class="form-label geosan">Kategori</label>
          <input type="text" class="form-control geosan uk-mn" id="kategori" name="kategori"
                 placeholder="Makanan/Minuman" required
                 oninput="capitalizeEachWord(this)" style="text-transform: capitalize;">
        </div>

        <div class="mb-3">
          <label for="harga" class="form-label geosan">Harga</label>
          <div class="input-group">
            <span class="input-group-text geosan uk-mn">Rp</span>
            <input type="number" class="form-control geosan uk-mn" name="harga"
                   id="harga" placeholder="0" autocomplete="off" required>
          </div>
        </div>

        <div class="mb-3 geosan">
          <label for="gambar" class="form-label geosan">Gambar</label>
          <input type="file" class="form-control" id="gambar" name="gambar" required>
        </div>

        <div class="my-4 d-grid gap-2 geosan">
          <button type="submit" name="submit" class="btn btn-primary"><b>Tambah Menu</b></button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  function capitalizeEachWord(input) {
    let words = input.value.toLowerCase().split(' ');
    for (let i = 0; i < words.length; i++) {
      if (words[i]) {
        words[i] = words[i][0].toUpperCase() + words[i].substr(1);
      }
    }
    input.value = words.join(' ');
  }
</script>

<?php require "partials/footer.php";?>

</body>
</html>

