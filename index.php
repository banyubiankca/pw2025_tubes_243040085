<?php
// koneksi antar file
require "partials/navbar.php";
require "partials/header.php";
?>

<!-- efek visual saat disentuh (berubah warna) -->
<style>
    
</style>
<br>
<br>
<br>

<!-- home -->
  <section id="home" >
    <div class="container">
      <div class="row">
        <div class="col-8-md">
        <div class="container">
          <br>
          <h1 class="miskan posisi">Welcome to Warmindo 21</h1>
          <p class="geosan posisi"><b>Your trusted partner for killing your hungrinees</b></p>
          <br>
          <img src="img/chefhat.jpeg" class="mx-auto d-block " style="width:300px; height:300px; border-radius: 50%">     
          </div>    
        </div>
    </header>
  </section>

<!-- about -->
  <section id="about" class="py-5">
    <div class="container mt-5">
      <div class="row">
        <div class="col-8-md">
          <h1 class="mb-3 miskan">About</h1>
          <p class="geosan">Welcome to <b> Warmindo 21</b>, a cozy and authentic culinary corner that brings the comforting taste of Indonesian street food to life. Inspired by the beloved warmindo (warung makan Indomie) culture found across cities and neighborhoods in Indonesia, we proudly serve meals that are simple, flavorful, and full of nostalgia.
                            At <b>Warmindo 21</b>, we believe that good food doesn’t have to be complicated. Our menu features a wide variety of classic Indonesian favorites—from the ever-popular Indomie Goreng Special and Nasi Telur to local side dishes like tahu isi, tempe goreng, and sosis bakar. Each dish is made fresh to order, using local ingredients and traditional techniques to capture the authentic taste of home.
                            Our place is more than just a food stop—it’s a space to connect, laugh, and unwind. With a laid-back atmosphere, friendly service, and the aroma of sizzling noodles in the air, <b>Warmindo 21</b> is where late-night cravings meet warm memories.
                            Whether you're a student looking for a budget-friendly meal, a traveler craving a familiar taste, or just someone who loves the simplicity of Indonesian comfort food, we welcome you with open arms. At <b>Warmindo 21</b>, every bite tells a story—and we can't wait to share it with you.
                            So come in, take a seat, and enjoy a delicious trip down memory lane.</p>
        </div>
      </div>
    </div>
  </section>
 
<!-- recomendation -->
  <div class="container">
    <div class="row">
  <section id="recomendation" class="py-5">       
    <h1 class="mb-3 miskan">Recomendation</h1>
    <p class="mt-3 geosan uk-judul">Discover the top picks from our kitchen — customer favorites and must-try dishes that highlight the best of what we offer:</p>
      <br>
      <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col">
        <div class="card h-100 box">
          <img src="img/nasigoreng.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h1 class="card-title geosan uk-mm"><b>Nasi Goreng</b></h1>
            <p class="card-text geosan uk-mn">Nasi goreng is a flavorful Indonesian fried rice dish, known for its savory taste, spices, and appetizing aroma.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 box">
          <img src="img/mieayam.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title geosan uk-mm"><b>Mie Ayam</b></h5>
            <p class="card-text geosan uk-mn">Springy noodles with savory-sweet chicken topping, served warm in flavorful broth and garnished with fresh scallions.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 box">
          <img src="img/sodagembira.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title geosan uk-mm"><b>Soda Gembira</b></h5>
            <p class="card-text geosan uk-mn">A refreshing mix of soda and sweet condensed milk — creamy, fizzy, and perfect for hot days.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 box">
          <img src="img/esjeruk.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title geosan uk-mm"><b>Es Jeruk</b></h5>
            <p class="card-text geosan uk-mn">Freshly squeezed orange juice over ice, naturally sweet and tangy — a cooling, thirst-quenching citrus drink.</p>
          </div>
        </div>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto geosan" href="detail2.php">
      <a class="btn btn-primary geosan uk-mo" type="button" href="detail2.php"><b>More</b></a>
      </div>
    </div>
  </section>
<!-- contact -->
  <section id="contact" class="py-5">
    <h1 class="mb-3 miskan">Contact</h1>
    <p class="mt-3 geosan uk-judul">Reach out to us for more information or inquiries.</p>
            <form class="mt-4 geosan">
                <div class="mb-3">
                    <input type="name" class="form-control font" placeholder="Your Name">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control font" placeholder="Your Email">
                </div>
                <div class="mb-3">
                    <textarea class="form-control font" rows="4" placeholder="Your Message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary uk-mo"><b>Send Message</b></button>
            </form>
        </div>
  </section>   
  </div>
  <?php require "partials/footer.php";?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>