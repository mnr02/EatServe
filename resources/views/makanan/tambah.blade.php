@extends('layout')

@section('konten')

@if(session('error'))
<script>
 alert("Masukkan data yang lengkap!");
</script>
@endif
   <br><br><br>
   <div style="margin: 20px">
   <h4>Tambah Makanan</h4>
   <form action="{{ route('makanan.submit') }}" method="post" autocomplete="off" enctype="multipart/form-data">
      @csrf  
      <label>Nama makanan</label>
      <input type="text" name="Nama_Makanan" class="form-control mb-2" placeholder="Masukkan Nama Makanan">
      <label>Jenis Makanan</label>
      <select name="Jenis_Makanan" id="jenis_makanan" class="form-control">
         <option>Makanan</option>
         <option>Minuman</option>
         <option>Promo</option>
      </select>
      <label>Deskripsi Makanan</label>
      <input type="text" name="Deskripsi" class="form-control mb-2" placeholder="Contoh : Burger Daging">
      <label>Harga</label>
      <input type="number" name="Harga" class="form-control mb-2" placeholder="Masukkan Harga Makanan">
      <label>Stok</label>
      <input type="number" name="Stok" class="form-control mb-2" placeholder="Masukkan jumlah makanan yang tersedia ">      
      <label for="gambar" class="form-label">Foto Makanan</label>
      <input type="file" name="gambar" id="gambar" class="form-control mb-5" accept="image/*">
        
      <div class="d-flex mb-3">
        <a class="btn btn-success" href="{{ route('makanan.tampil') }}">Kembali</a>
        <div class="ms-auto">
           <button class="btn btn-primary">Tambah</button>  
        </div>
       </div>
             
   </div>

   </form>


  
   
   

@endsection