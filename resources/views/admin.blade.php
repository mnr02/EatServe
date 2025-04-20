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
          <a class="masuk" href="{{ route('admin2') }}">@ {{ Auth::user()->username }}</a>
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
        <div class="kotak_pesanan">
          <h2>Pesanan</h2>  
          @foreach ($pesanan as $data)
            <div class="card-pesanan">
              <div class="pemisah">
                <div class="text">
                  <div>
                    <h2 style="padding-right:20px; color:#3e2723; font-weight: bolder;">{{ $data->nama_customer }}</h2>
                    <p>
                      @if ($data->status == 'baru')
                        <span class="badge bg-secondary">Baru</span>
                      @elseif ($data->status == 'proses')
                        <span class="badge bg-warning text-dark">Proses</span>
                      @elseif ($data->status == 'selesai')
                        <span class="badge bg-success">Selesai</span>
                      @endif
                    </p>
                  </div>
                  <h6>{{  $data->kode_pesanan }}</h6>
                </div>
                  
                <div class="lanjut">
                  <h5>Rp {{ number_format($data->total_harga, 0, ',', '.') }}</h5>
                  <h6>{{ $data->daftar_menu  }}</h6>
                  <div class="button">
                    <form action="{{ route('lacak.cari') }}" method="GET">
                      @csrf
                      <input class="form-control mb-2" type="hidden" name="kode" value="{{ $data->kode_pesanan }}">
                      <button class="btn btn-sm btn-primary" style="width: 90px;">Detail</button>
                    </form>
                    <form action="{{ route('pesanan.tolak', $data->id) }}" method="post" onsubmit="return confirmDelete()">
                      @csrf
                      <button class="btn btn-sm btn-danger" style="width: 90px;">Tolak</button>
                    </form>
                    @if ($data->status == 'baru')
                      <form action="{{ route('pesanan.proses', $data->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-warning">Proses</button>
                      </form>
                    @elseif ($data->status == 'proses')
                      <form action="{{ route('pesanan.selesai', $data->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-success">Selesai</button>
                      </form>
                    @endif
                  </div>
                  </div>
                </div>
            </div>
          @endforeach
        </div>
      </div>
  
      <div class="kanan">
        <div class="stok">
          <div>
            <h2>Stok Menipis</h2>
            @foreach($lowStockItems as $item)
              <div class="card-stok d-flex justify-content-between align-items-center mb-2">
                <span>{{ $item->Nama_Makanan }} ({{ $item->Stok }})</span>
                <form action="{{ route('makanan.tambahStok', $item->id) }}" method="POST" class="d-flex">
                  @csrf
                  <input type="number" name="jumlah" class="form-control me-2" placeholder="Jumlah" min="1" style="width: 100px;" required>
                  <button class="tambah" type="submit" class="btn btn-success btn-sm">Tambah</button>
                </form>
              </div>
            @endforeach

            @if($lowStockItems->isEmpty())
              <p class="text-muted">Semua stok aman 🍽️</p>
            @endif
          </div>
        </div>
  
        <div class="riwayat">
          <h2>Riwayat Pesanan</h2>
          @foreach ($history as $data)
            <p>{{$data->nama_customer}}: {{ $data->daftar_menu }} ({{ $data->total_harga }}) - {{ $data->status }}</p>
          @endforeach 

          @if($history->isEmpty())
            <p class="text-muted">Belum ada riwayat pesanan</p>
          @endif
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

<script>
  function confirmDelete() {
    return confirm('Apakah Anda yakin ingin menolak pesanan ini?');
  }
</script>
</html>