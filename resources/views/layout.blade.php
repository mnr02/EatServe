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
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
</head>

<header id="navbar">
    <div>
        <a href="#informasi" onclick="saveScroll()"><img class="logoNav" src="/Image/logo_3.png" alt="test"></a>
    </div>
  
    <nav class="navbar">
      <ul>
        <li><a href="{{ route('welcome') }}">HOME</a></li>
        <li><a href="{{ route('Daftar_Menu') }}">MENU</a></li>
        <li><a href="{{ route('welcome') . '#promo' }}">PROMO</a></li>
      <li><a href="{{ route('lacak.form') }}">LACAK</a></li>
      <li><a href="{{ route('welcome') . '#about' }}">ABOUT US</a></li>
      </ul>
    </nav>
</header>

<body>
  <div class="konten">
    @yield('konten')
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
  let lastScroll = 0;

  function saveScroll() {
    lastScroll = window.scrollY || window.pageYOffset;
  }

  function restoreScroll() {
    history.replaceState(null, null, window.location.pathname);
    setTimeout(() => {
      window.scrollTo({ top: lastScroll, behavior: 'smooth' });
    }, 10);
  }
</script>
</html>