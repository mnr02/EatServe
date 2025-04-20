@extends('layout')

@section('konten')

@if(session('error'))
<script>
 alert("Masukkan data yang lengkap!");
</script>
@endif

<br>
<br>
<br>
<div style="margin: 20px">
    <h1>Buat Pesanan Baru</h1>
    <form action="{{ route('pesanan.submit') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf  
        <label>Nama Lengkap</label>
        <input type="text" name="nama_customer" class="form-control mb-2" placeholder="Masukkan Nama Lengkap Penerima">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control mb-2" placeholder="Masukkan alamat lengkap Anda!">
        <label>Metode Pembayaran</label>
        <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
            <option>Tunai</option>
            <option>E-money</option>
        </select> 
        <div id="e-money-section" style="display: none; margin-top: 15px;">
            <label>Silakan Scan QRIS di bawah ini:</label><br>
            <img src="{{ asset('image/qris.jpg') }}" alt="QRIS" style="width: 250px; margin-bottom: 10px;"><br>
            <label>Upload Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" class="form-control mb-2" accept="image/*">
        </div>
      
        <label>Pengambilan</label>
        <small class="text-muted">Biaya tambahan Rp 10.000 akan dikenakan untuk delivery</small>
        <select name="delivery" id="delivery" class="form-control">
            <option value="1" {{ $pesanan->delivery ? 'selected' : '' }}>Delivery</option>
            <option value="0" {{ !$pesanan->delivery ? 'selected' : '' }}>Ambil di Tempat</option>
        </select> 
        <br>

        <table class="table table-bordered" id="checkout-table" border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <!-- Akan diisi via JavaScript -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong id="total-belanja">Rp 0</strong></td>
                </tr>
            </tfoot>
        </table>

        <input type="hidden" name="total_harga" class="form-control mb-2" placeholder="Masukkan Harga Makanan">
        <input type="hidden" name="checkout_cart" id="checkout_cart_input">
        <br>
        <br>
        <div class="d-flex mb-3">
            <a class="btn" href="{{ route('Daftar_Menu') }}">Kembali</a>
            <div class="ms-auto">
                <button class="btn">Pesan</button>  
            </div>
        </div> 
    </form>    
</div>

<style>
    .btn {
        background: rgb(251, 197, 13);
        width: 120px;
        color: black;
        transition: all ease-in-out 0.1s;
    }

    .btn:hover {
        background:#c0392b;
        color: wheat;
        transform:scale(105%);
        transition: all ease-in-out 0.1s;
    }

    h1 {
    font-family: 'Bree Serif', serif;
    color: #3e2723;
    font-weight: bolder;
    }
</style>


<script>
    const cart = JSON.parse(localStorage.getItem('checkoutCart'));
    
    if (cart) {
        document.getElementById('checkout_cart_input').value = JSON.stringify(cart);
    }

    const tbody = document.querySelector('#checkout-table tbody');
    const totalHargaInput = document.querySelector('input[name="total_harga"]');
    const deliverySelect = document.getElementById('delivery');
    
    let total = 0;
   
    function tampilkanItem() {
        tbody.innerHTML = ""; // reset tbody biar ngga dobel
        total = 0;
   
        // Tampilkan item dari cart
        for (const name in cart.items) {
            const item = cart.items[name];
            const subtotal = item.quantity * item.price;
            total += subtotal;
   
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${name}</td>
                <td>${item.quantity}</td>
                <td>Rp ${item.price.toLocaleString()}</td>
                <td>Rp ${(subtotal).toLocaleString()}</td>
            `;
            tbody.appendChild(row);
        }
   
        // Kalau delivery, tambahkan baris ongkir
        if (deliverySelect.value === "1") {
            const ongkirRow = document.createElement('tr');
            ongkirRow.innerHTML = `
                <td colspan="3"><em>Biaya Ongkir</em></td>
                <td>Rp 10.000</td>
            `;
            tbody.appendChild(ongkirRow);
        }
   
        updateTotalHarga(); // update total
    }
   
    function updateTotalHarga() {
        let finalTotal = total;
        if (deliverySelect.value === "1") {
            finalTotal += 10000;
        }
            totalHargaInput.value = finalTotal;
            document.getElementById('total-belanja').textContent = 'Rp ' + finalTotal.toLocaleString();
    }
   
    // Jalankan awal
    tampilkanItem();
   
    // Kalau user ubah metode pengambilan
    deliverySelect.addEventListener('change', tampilkanItem);

    const metodeSelect = document.getElementById('metode_pembayaran');
    const eMoneySection = document.getElementById('e-money-section');

    metodeSelect.addEventListener('change', function() {
        if (this.value === "E-money") {
            eMoneySection.style.display = 'block';
        } else {
            eMoneySection.style.display = 'none';
        }
    });

    // Kalau user reload halaman dan sebelumnya sudah pilih E-money
    if (metodeSelect.value === "E-money") {
        eMoneySection.style.display = 'block';
    }
</script>
@endsection



