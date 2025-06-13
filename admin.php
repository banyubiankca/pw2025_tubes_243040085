<?php
//koneksi antar file
require "functions.php";
require "partials/navbar2.php";
require "partials/header.php";
?>

<br>
  <!-- menu -->
<section id="menu" class="py-5">
    <div class="container">
        <div class="row">
          <div class="col">
            <h1 class= "miskan">Menu</h1>
            <a class="navbar-brand geosan warna-tambah " href="tambah.php"><i class="bi bi-plus"></i>Tambah Menu Makanan Anda</a>
            <br>
            <form action="" method="post" class="mb-3 geosan uk-src">
              <input type="text" name="keyword" placeholder="🔍Search" autocomplete="off" autofocus>
              <button type="submit" name="search" >Search</button>
            <br>
            <br>
            </form>
      <table class="table table-hover table-menu">
        <thead class="table-dark">
        <tr>
        <b>
          <th class="uk-judul geosan";>No</th>
          <th class="uk-judul geosan";>Nama</th>
          <th class="uk-judul geosan";>Kategori</th>
          <th class="uk-judul geosan";>Harga</th>
          <th class="uk-judul geosan";>Aksi</th>
        </b>
        </thead>
      <tbody>     
        </tr>
        <?php $i=1; ?>
        <?php foreach($menu as $mn) : ?>
        <tr>
          <td class="geosan text-menu"><b><?= $i++ ?></b></td>
          <td class="geosan text-menu"><?= $mn['nama_makanan'] ?></td>
          <td class="geosan text-menu"><?= $mn['kategori']?></td>
          <td class="geosan text-menu"><?= $mn['harga']?></td>
          
          <td>
            <a href="detail.php?id_makanan=<?= $mn['id_makanan']; ?>" class="btn btn-outline-secondary"><i class="bi bi-eye"></i></a>
            <a href="edit.php?id_makanan=<?= $mn['id_makanan']; ?>" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
            <a href="hapus.php?id_makanan=<?= $mn['id_makanan']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></a>

          </td>            
          
        </tr>
        <?php endforeach; ?>
        </div>
      </table> 
    </div>     
    <br>
    
<?php require "partials/footer.php";?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>