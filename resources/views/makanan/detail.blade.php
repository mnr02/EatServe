@extends('layout')

@section('konten')
<br><br><br>
<div style="padding: 20px">
   <div class="d-flex justify-content-between align-items-center mb-3">
      <h4>Detail Makanan</h4>
      <a class="btn btn-success" href="{{ route('makanan.tampil') }}">Kembali</a>
    </div>
    <form action="{{ route('makanan.update', $makanan->id) }}" method="post">
       @csrf  
       <label>Nama makanan</label>
       <input type="text" name="Nama_Makanan" class="form-control mb-2" value="{{ $makanan->Nama_Makanan}}" disabled>
       <label>Jenis Makanan</label>
       <input type="text" name="Jenis_Makanan" class="form-control mb-2" value="{{ $makanan->Jenis_Makanan}}" disabled>
       <label>Deskripsi Makanan</label>
       <input type="text" name="Deskripsi" class="form-control mb-2" value="{{ $makanan->Deskripsi}}" disabled>
       <label>Harga</label>
       <input type="number" name="Harga" class="form-control mb-2" value="{{ number_format($makanan->Harga, 0, ',', '.') }}" disabled>
       <label>Stok</label>
       <input type="text" name="Stok" class="form-control mb-2" value="{{ $makanan->Stok}}" disabled> 
       <label for="tersedia">Status Menu:</label>
       <input type="text" name="tersedia" class="form-control mb-2" value="{{ $makanan->tersedia ? 'Aktif' : 'Tidak Aktif' }}" disabled>     
       <label for="gambar" class="form-label">Foto Makanan</label>
       <div class="mb-3 ">
          @if ($makanan->Gambar)
              <img style="width: 500px" src="{{ asset('storage/' . $makanan->Gambar) }}" alt="Gambar Makanan" class="img-thumbnail center" style="width: 150px;">
          @else
              <p>Tidak ada gambar.</p>
          @endif
       </div>    
    </form> 
</div>
   
   

@endsection