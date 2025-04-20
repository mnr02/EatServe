@extends('layout')

@section('konten')
<div style="height: 15vh"></div>
<div class="thankyou-container">
  <br>
  <h1>Terima kasih atas pesanan Anda!</h1>
  <div class="kode">
    <p>Kode Pesanan Anda: <strong id="kodeUnik">{{ $pesanan->kode_pesanan }}</strong></p>
    <div style="width: 10px"></div> 
    <button class="salin" onclick="salinKode()">Salin</button>
  </div>
  <p>Gunakan kode ini untuk melacak status pesanan Anda.</p>
  <p>Nama: {{ $pesanan->nama_customer }}</p>

  @if ($pesanan->metode_pembayaran === 'E-money' && $pesanan->bukti_pembayaran)
    <p>Bukti Pembayaran:</p>
    <img src="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}" width="200">
  @endif
  <br>
  <br>
  <div class="button-group">
    <button class="button-group button"><a href="{{ route('welcome') }}">Kembali ke Menu</a></button>
    <button class="button-group button"><a href="https://wa.me/6282278877079?text=inpokan%20pesanan%20saya%20dengan%20kode%3A%20{{ $pesanan->kode_pesanan }}" target="_blank">Chat Admin via WhatsApp</a></button>
    <button class="button-group button"><a href="{{ route('lacak.form') }}">Lacak Pesanan</a></button>
  </div>
  <br>
</div>

<style>
  body {
    display: flex;
    justify-content: center;
  }

  .thankyou-container {
    max-width: 700px;
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

  .kode {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  strong {
    color: rgb(251, 197, 13);
    font-weight: bold;
    font-size: 18px;
  }

  img {
    margin-top: 15px;
    max-width: 200px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  }

  .button-group {
    margin-top: 5px;
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    justify-content: center;
    border: none;
    align-items: center;
  }

  .salin {
    width: 100px;
    height: 30px;
    border: none;
    background-color: #3e2723;;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    cursor: pointer;
  }
   
  .button-group a {
    padding-top: 7px;
    height: 40px;
    width: 250px;
    background-color: #3e2723;;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s ease;
  }

  .button-group a:hover, .salin:hover {
    background-color:rgb(251, 197, 13);
    color: black;
  }

</style>

<script>
  function salinKode() {
    var kode = document.getElementById("kodeUnik").innerText;
    var temp = document.createElement("textarea");
    temp.value = kode;
    document.body.appendChild(temp);
    temp.select();
    document.execCommand("copy");
    document.body.removeChild(temp);
    alert("Kode '" + kode + "' berhasil disalin!");
  }
</script>
@endsection
