@extends('layout')

@section('konten')
<div style="height: 35vh"></div>
<div class="kotak">
    <br>
    <h1>Lacak Pesanan Anda Gess</h1>

    <form action="{{ route('lacak.cari') }}" method="GET">
        <input class="form-control mb-2" type="text" name="kode" placeholder="Masukkan Kode Unik" required autocomplete="off">
        @if(session('error'))
            <p style="color:red;">{{ session('error') }}</p>
        @endif
        <br>
        <button class="lacak" type="submit">Lacak</button>
    </form>
    <br>
    <br>
    <p>Gunakan kode yang telah disalin untuk melacak status pesanan Anda.</p>
</div>

<style>
    body {
        display: flex;
        justify-content: center;
    }

    .kotak {
        width: 700px;
        height: 300px;
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

    .lacak {
        height: 40px;
        width: 250px;
        border: none;
        background-color: #3e2723;;
        color: #fff;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .lacak:hover {
        background-color:rgb(251, 197, 13);
        color: black;
    }
</style>

@endsection
