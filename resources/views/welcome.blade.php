<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EarServe</title>
    <link rel="icon" href="/Image/logo_2.png">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<header id="navbar">
  <div>
   <a href="#informasi"><img class="logoNav" src="/Image/logo_3.png" alt="test"></a> 
  </div>

  <nav class="navbar">
    <ul>
      <li><a href="#">HOME</a></li>
      <li><a href="{{ route('Daftar_Menu') }}">MENU</a></li>
      <li><a href="#promo">PROMO</a></li>
      <li><a href="{{ route('lacak.form') }}">LACAK</a></li>
      <li><a href="#about">ABOUT US</a></li>
    </ul>
  </nav>
</header>

<body>
  <div>
    <img class="bg" src="/Image/burger.jpg" alt="BURGER" style="width: 100%">
    <div class="judul">
      <h1>EATSERVE</h1>
      <h2>CEPAT, NIKMAT, PRAKTIS</h2>
      <button><a href="{{ route('Daftar_Menu') }}">ORDER NOW</a></button>
    </div>
  </div>

  <div class="promo">
    <h1>OUR SPECIAL</h1>
    <div class="container">
      <div class="menu">
        <div class="item">
          <img src="/Image/burger_double.png" alt="Burger Double">
          <div class="price">Rp24.999</div>
          <div class="name">BURGER DOUBLE</div>
          <div class="desc">Burger dengan dua potong daging sapi yang dipanggang</div>
        </div>
        <div class="item">
          <img src="/Image/Kentang_Goreng.jpg" alt="Kentang Goreng">
          <div class="price">Rp17.999</div>
          <div class="name">KENTANG GORENG</div>
          <div class="desc">Kentang goreng krispi dengan saus khas restaurant kami</div>
        </div>
        <div class="item">
          <img src="/Image/Sayap_Ayam.jpg" alt="Chiken Wings">
          <div class="price">Rp34.999</div>
          <div class="name">Chiken Wings</div>
          <div class="desc">Sayap ayam pilihan yang dimasak menggunkan resep turun temurun</div>
        </div>
        <div class="item">
          <img src="/Image/Sirloin_Steak.jpg" alt="Steak">
          <div class="price">Rp49.999</div>
          <div class="name">Steak Daging</div>
          <div class="desc">Steak daging sapi yang sudah terjamin kenikmatannya</div>
        </div>
      </div>
    </div>
  </div>

  <div class="pesanan" id="promo">
    <img src="/Image/burger_2.jpg " alt="pesanan" style="width: 95%">     
    <button><a href="{{ route('Daftar_Menu') }}">Pesan Sekarang</a></button> 
  </div>

  <div class="menuuu">
    <div class="carousel-wrapper">
      <button class="nav-button nav-left" onclick="scrollCarousel(-1)">&#10094;</button>
      <div class="carousel-track" id="carouselTrack">
        <!-- Item 1 -->
        <div class="carousel-item">
          <img src="/Image/burger_double.png" alt="1">
          <div class="item-text">
            <div class="item-title">Burger & Beer $6.99</div>
            <div class="item-desc">Lorem ipsum dolor sit amet.</div>
          </div>
        </div>
        <!-- Item 2 -->
        <div class="carousel-item">
          <img src="/Image/burger_double.png" alt="2">
          <div class="item-text">
            <div class="item-title">Burger</div>
            <div class="item-desc">Ut elit tellus, luctus nec.</div>
          </div>
        </div>
        <!-- Item 3 -->
        <div class="carousel-item">
          <img src="/Image/burger_double.png" alt="3">
          <div class="item-text">
            <div class="item-title">Burger Keju</div>
            <div class="item-desc">Burger daging dengan keju slice</div>
          </div>
        </div>
        <!-- Item 4 -->
        <div class="carousel-item">
          <img src="/Image/burger_double.png" alt="4">
          <div class="item-text">
            <div class="item-title">Burger Double</div>
            <div class="item-desc">Burger dengan dua daging</div>
          </div>
        </div>
        <!-- Item 5 -->
        <div class="carousel-item">
          <img src="/Image/burger_double.png" alt="5">
          <div class="item-text">
            <div class="item-title">Burger Bawang</div>
            <div class="item-desc">Burger dengan ekstra bawang</div>
          </div>
        </div>
        <!-- Item 6 -->
        <div class="carousel-item">
          <img src="/Image/burger_double.png" alt="5">
          <div class="item-text">
            <div class="item-title">Burger sayur</div>
            <div class="item-desc">Burger vegetarian tanpa daging</div>
          </div>
        </div>
        <!-- Item 7 -->
        <div class="carousel-item">
          <img src="/Image/burger_double.png" alt="5">
          <div class="item-text">
            <div class="item-title">Burger BBQ</div>
            <div class="item-desc">Burger dengan daging BBQ</div>
          </div>
        </div>
        <!-- Item 8 -->
        <div class="carousel-item button-next">
          <a href="{{ route('Daftar_Menu') }}">Menu Lainnya &rarr;</a>
        </div>
      </div>
      <button class="nav-button nav-right" onclick="scrollCarousel(1)">&#10095;</button>
    </div>
  </div>

  <div class="hero-section">
    <img src="/Image/SPECIAL.png" alt="tulisan" style="width: 850px">
  </div>

  <div class="content-section">
    <h2>BEST RESTAURANT</h2>
    <div class="underline"></div>
      <p>
        Nikmati cita rasa makanan cepat saji terbaik di kota!
        Daging pilihan yang dimasak dengan sempurna, saus rahasia penuh rasa, dan suasana hangat yang bikin kamu ingin kembali lagi.
        Baik untuk makan bersama keluarga, nongkrong bareng teman, atau sekadar memanjakan lidah — menu kami siap memanjakan kamu!  
      </p>
  </div>

  <div class="about" id="about">
    <img src="/Image/about.jpg" alt="" style="width: 100%">
    <section class="visit-section">
      <h2 class="visit-title">VISIT US</h2>
      <p class="address">Jl. Electrical No.128 Palembang Sumatera Selatan</p>
      <p class="order-label"><em>Order online:</em></p>
      <div class="order-icons">
        <a href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        <a href="#"><i class="fas fa-store"></i> Shopee</a>
        <a href="#"><i class="fas fa-motorcycle"></i> Gojek</a>
        <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
        <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
      </div>
    </section>
  </div>

  <div class="inpo" id="informasi">
    <div id="kotak">
        <a  href="#" class="close" onclick="restoreScroll()">X</a>
        <h3 style="font-size: 30px">Informasi</h3>
        <p>Website ini masih dalam tahp pengembangan
            Maaf jika masih terdapat banyak kesalahan atau bug didalamnya
        </p>
        <a class="salam_admin" href="{{ route('admin') }}">Salam Hormat, Admin</a>
    </div>
</div>
</body>


<script>
  window.addEventListener("scroll", function() {
    let navbar = document.getElementById("navbar"); 
    let logo   = document.querySelector(".logoNav"); // Perbaikan selector

    if (window.scrollY > 600) { 
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }

    if (window.scrollY > 680) { 
      logo.classList.add("scrolled"); // Tambahkan class untuk logo
    } else {
      logo.classList.remove("scrolled"); // Hapus class dari logo
    }
  });

  function scrollCarousel(direction) {
    const track = document.getElementById('carouselTrack');
    const scrollAmount = 280 + 300; // width item + gap
    track.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
  }

  let lastScroll = 0;

  function saveScroll() {
    lastScroll = window.scrollY || window.pageYOffset;
  }

  function restoreScroll() {
    // Hilangkan #popup dari URL (tanpa reload)
    history.replaceState(null, null, window.location.pathname);
    // Scroll kembali ke posisi sebelumnya
    setTimeout(() => {
      window.scrollTo({ top: lastScroll, behavior: 'smooth' });
    }, 10);
  }
</script>
</html>
