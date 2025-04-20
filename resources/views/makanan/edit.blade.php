@extends('layout')

@section('konten')
<br><br><br>
<div style="padding: 20px">
   <h4>Edit Menu Makanan</h4>
   <form action="{{ route('makanan.update', $makanan->id) }}" method="post" enctype="multipart/form-data">
      @csrf  
      @method('PUT') <!-- Spoofing method untuk PUT -->

      <label>Nama makanan</label>
      <input type="text" name="Nama_Makanan" class="form-control mb-2" value="{{ $makanan->Nama_Makanan}}">
      <label>Jenis Makanan</label>
      <input type="text" name="Jenis_Makanan" class="form-control mb-2" value="{{ $makanan->Jenis_Makanan}}">
      <label>Deskripsi Makanan</label>
      <input type="text" name="Deskripsi" class="form-control mb-2" value="{{ $makanan->Deskripsi}}">
      <label>Harga</label>
      <input type="number" name="Harga" class="form-control mb-2" value="{{ $makanan->Harga }}">
      <label>Stok</label>
      <input type="text" name="Stok" class="form-control mb-2" value="{{ $makanan->Stok}}">  
      <label for="tersedia">Status Menu:</label>
      <select name="tersedia" id="tersedia" class="form-control">
          <option value="1" {{ $makanan->tersedia ? 'selected' : '' }}>Aktif</option>
          <option value="0" {{ !$makanan->tersedia ? 'selected' : '' }}>Tidak Aktif</option>
      </select> 
      <!-- Bagian untuk gambar -->
      <div class="mb-3 d-flex justify-content-center">
         <img id="previewGambar" 
              src="{{ $makanan->Gambar ? asset('storage/' . $makanan->Gambar) : 'https://via.placeholder.com/500x300?text=No+Image' }}" 
              alt="Gambar makanan" 
              class="img-thumbnail center" 
              style="width: 500px;">
      </div>

      <label for="gambar" class="form-label">Perbarui Gambar</label>
      <input type="file" name="gambar" id="gambar" class="form-control mb-5" accept="image/*">
      
      <div class="d-flex mb-3">
         <a class="btn btn-success" href="{{ route('makanan.tampil') }}">Kembali</a>
         <div class="ms-auto">
            <button class="btn btn-warning me-3" style="width: 90px">Edit</button>
         </div>
      </div>
   </form>
</div>


<script>
   document.getElementById('gambar').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
         const reader = new FileReader();
         reader.onload = function(e) {
            document.getElementById('previewGambar').src = e.target.result;
         };
         reader.readAsDataURL(file);
      }
   });
</script>
@endsection
