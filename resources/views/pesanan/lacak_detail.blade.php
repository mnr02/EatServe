@extends('layout')

@section('konten')
<div style="height: 15vh"></div>
<div class="kotak">
<br>
<h1>Detail Pesanan</h1>

@if($pesanan)
    <div class="card">
        <br>
        <div class="kotak_table" style="width: 500px">
        <table class="table table-bordered table-striped">
            <tr>
              <th>Nama</th>
              <td>{{ $pesanan->nama_customer }}</td>
            </tr>
            <tr>
              <th>Kode Pesanan</th>
              <td>{{ $pesanan->kode_pesanan }}</td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td>{{ $pesanan->alamat }}</td>
            </tr>
            <tr>
              <th>Menu Pesanan</th>
              <td>{{ $pesanan->daftar_menu }}</td>
            </tr>
            <tr>
              <th>Total Harga</th>
              <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td>{{ ucfirst($pesanan->status) }}</td>
            </tr>
            <tr>
              <th>Metode Pembayaran</th>
              <td>{{ $pesanan->metode_pembayaran }}</td>
            </tr>
          </table>
        </div>
          

        @if($pesanan->metode_pembayaran == 'E-money')
            <p><strong>Bukti Pembayaran:</strong></p>
            <img class="bukti" src="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}" alt="Bukti Pembayaran">
        @endif
    </div>
@else
    <p>Pesanan tidak ditemukan. Periksa kembali kode pesanan Anda.</p>
@endif
<br>
@if(Auth::check()) 
    <button class="kembali"><a href="{{ route('admin') }}">← Kembali</a></button>
@else
    <button class="kembali"><a href="{{ route('lacak.form') }}">← Kembali</a></button>
@endif
<div style="height:10px"><br></div>
</div>


<style>
    body {
        display: flex;
        justify-content: center;
    }

    .kotak {
        width: 700px;
        /* height: 300px; */
        background-color: #fff;
        padding: 5px 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        text-align: center;
    }

    h1 {
        font-family: 'Bree Serif', serif;
        font-size: 32px;
        color: #4e342e;
        margin-bottom: 20px;
    }
   
    p {
        font-size: 16px;
        color: #444;
        margin: 10px 0;
    }

    .kembali {
        height: 50px;
        width: 200px;
        border: none;
        background-color: #3e2723;
        color: #fff;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .kembali:hover {
        background-color:rgb(251, 197, 13);
        color: black;
    }

    .kembali a {
        color: wheat;
        text-decoration: none;
    }

    .kembali a:hover {
        color: rgb(0, 0, 0);
    }

    .card {
        display: flex;
        align-items: center;
    }

    .bukti {
        justify-self: center;    
        max-width: 300px;
    }

    th {
        text-align: start;
    }
</style>

@endsection

