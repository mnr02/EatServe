<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EarServe</title>
    <link rel="icon" href="/Image/logo_2.png">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
</head>

<header id="navbar">
  <div>
      <a href="{{ route('welcome') }}" onclick="saveScroll()"><img class="logoNav" src="/Image/logo_3.png" alt="test"></a>
  </div>

  <nav class="navbar">
      <div id="akun">
        @if(Auth::guest()) 
          <a class="masuk" href="{{ route('login') }}">Masuk</a>
          <a class="daftar" href="{{ route('registrasi.tampil') }}">Daftar Akun</a>
        @endif
        @if(Auth::check()) 
          <a class="masuk" href="{{ route('admin') }}">@ {{ Auth::user()->username }}</a>
          <a class="daftar" href="{{ route('logout') }}">Keluar</a>
        @endif
      </div>
  </nav>
</header>

<body>
  <section class="judul">
    <img src="/Image/judul_admin.png" alt="beef" style="width: 100%"> 
    <h1>DASHBOARD</h1>
  </section>

  <section class="info">
    <div class="menu-bar">
      <a href="#" class="menu-item">
        <img src="https://cdn-icons-png.flaticon.com/128/1077/1077114.png" alt="Nama">
        <span>{{ strtoupper(Auth::user()->name) }}</span>
      </a>
      <a href="#" class="menu-item">
        <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" alt="Jabatan">
        <span>ADMIN</span>
      </a>
      <a href="#" class="menu-item">
        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828640.png" alt="Status">
        <span>AKTIF</span>
      </a>
      <a href="#" class="menu-item">
        <img src="https://cdn-icons-png.flaticon.com/128/684/684908.png" alt="Cabang">
        <span>PLAJU</span>
      </a>
      <a href="#" class="menu-item">
        <img src="/Image/logo_2.png" alt="Eatserve">
        <span>EATSERVE</span>
      </a>
    </div>
  </section>

  <section class="konten">
    <div class="dashboard-container">
      <div class="pesanan">
        <div class="kotak_pesanan2">
          <h2>Akun Terdaftar</h2>  
          @foreach ($akun as $data)
            <div class="card-pesanan">
              <div class="pemisah">
                <div class="text">
                  <h5>{{ $data->name }}</h5>
                  <h6>{{  $data->username }}</h6>
                </div>
                <div class="hargo">
                  <form action="{{ route('hapus.akun', $data->id) }}" method="post" onsubmit="return confirmDelete()">
                    @csrf
                    <button class="btn btn-sm btn-danger" style="width: 120px;">Hapus Akun</button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
  
      <div class="kanan">
        <div class="stok">
          <h2>Tambah Akun</h2>
          <button><a href="{{ route('registrasi.tampil') }}">Registrasi</a></button>
        </div>
        <div class="riwayat">
          <h2>Kelola Menu</h2>
          <button><a href="{{ route('makanan.tampil') }}">Tabel Menu Makanan</a></button>
          <button><a href="{{ route('makanan.tambah') }}">Tambah Menu</a></button>
        </div>
        <div class="logo">
          <img src="/Image/logo_4.png" alt="logo" style="width: 365px; border-radius:8px">
        </div>
      </div>
    </div>
  </section>

  <div class="about" id="about" style="height: 100px">
    <img src="/Image/about.jpg" alt="" style="width: 100%; height: 150px;">
    <section class="visit-section">
      <p>&copy; 2025 EarServe. All rights reserved.</p>
    </section>
  </div>
</body>



<style>
  button {
    border: none;
    background-color: #3e2723;;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
    margin: 5px 5px 5px 0;
    border: none;
    padding: 6px 12px; 
  }

  button a {
    text-decoration: none;
    color: wheat;
    font-weight: 500;
  }

  button a:hover {
    color: black;
  }

  button:hover {
    background-color:rgb(251, 197, 13);
    color: black;
  }

  .pemisah {
    display:flex; 
    justify-content: space-between; 
    width: 750px; 
  }
</style>

<script>
  function confirmDelete() {
    return confirm('Hapus akun ini? Tindakan ini tidak dapar diurungkan!');
}
</script>
</html>