@extends('layout')

@section('konten')
<link rel="stylesheet" href="/css/daftar_menu.css">

<section class="judul">
    <img src="/Image/judul_admin.png" alt="beef" style="width: 100%"> 
    <img class="judul_menu" src="/Image/menu.png" alt="Daftar Menu">
</section>

<div class="wadah_item" style="height: 100vh">
    <div class="row mt-4 mx-3">
        <h1>Promo</h1>
        @foreach ($promo as $data)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100" style="position: relative">
                    <img src="{{ asset('storage/' . $data->Gambar) }}" alt="Gambar Mahasiswa" class="card-img-top m-2" style="height: 150px; width: 150px; object-fit: cover;">
                    <div class="text">
                        <h5>{{ $data->Nama_Makanan }}</h5>
                        <h6>{{  $data->Deskripsi }}</h6>
                    </div>
                    <div class="hargo">
                        <h6>Tersedia : {{ $data->Stok}}</h6>
                        <h5>Rp {{ number_format($data->Harga, 0, ',', '.') }}</h5>
                        <button  onclick="addToCart('{{ $data->Nama_Makanan }}', {{ $data->Harga }})"><i class="fas fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
        @if($promo->isEmpty())
            <p class="text-muted">Belum ada promo</p>
        @endif

        <h1>Makanan</h1>
        @foreach ($makanan as $data)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100" style="position: relative">
                    <img src="{{ asset('storage/' . $data->Gambar) }}" alt="Gambar Mahasiswa" class="card-img-top m-2" style="height: 150px; width: 150px; object-fit: cover;">
                    <div class="text">
                        <h5>{{ $data->Nama_Makanan }}</h5>
                        <h6>{{  $data->Deskripsi }}</h6>
                    </div>
                    <div class="hargo">
                        <h6>Tersedia : {{ $data->Stok}}</h6>
                        <h5>Rp {{ number_format($data->Harga, 0, ',', '.') }}</h5>
                        <button  onclick="addToCart('{{ $data->Nama_Makanan }}', {{ $data->Harga }})"><i class="fas fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
        @endforeach

        <h1>Minuman</h1>
        @foreach ($minuman as $data)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100" style="position: relative">
                    <img src="{{ asset('storage/' . $data->Gambar) }}" alt="Gambar Mahasiswa" class="card-img-top m-2" style="height: 150px; width: 150px; object-fit: cover;">
                    <div class="text">
                        <h5>{{ $data->Nama_Makanan }}</h5>
                        <h6>{{  $data->Deskripsi }}</h6>
                    </div>
                    <div class="hargo">
                        <h6>Tersedia : {{ $data->Stok}}</h6>
                        <h5>Rp {{ number_format($data->Harga, 0, ',', '.') }}</h5>
                        <button  onclick="addToCart('{{ $data->Nama_Makanan }}', {{ $data->Harga }})"><i class="fas fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div style="height: 50vh"></div>


<div id="floating-cart">
    <div style="flex-grow: 1; padding-right: 10px;">
        <strong style="display: block; margin-bottom: 5px;">🛒 Keranjang:</strong>
        <div id="cart-items"></div>
    </div>

    <div style="text-align: right;">
        <div><strong>Total:</strong> Rp <span id="cart-total">0</span></div>
        <button class="check" onclick="checkoutCart()">Checkout</button>
    </div>
</div>


<script>
    let cart = {
        items: {},
        total: 0
    };

    function addToCart(name, price) {
        if (cart.items[name]) {
            cart.items[name].quantity++;
        } else {
            cart.items[name] = {
                price: price,
                quantity: 1
            };
        }
        cart.total += price;
        updateCartDisplay();
    }

    function updateCartDisplay() {
        const cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = '';

        for (const name in cart.items) {
            const item = cart.items[name];
            const itemDiv = document.createElement('div');
            itemDiv.style = `
                background-color: #f9f9f9;
                border: 1px solid #ccc;
                border-radius: 8px;
                padding: 8px 12px;
                font-size: 14px;
                width: 100%;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                box-sizing: border-box;
                display: flex;
                justify-content: space-between;
                align-items: center;
            `;

            itemDiv.innerHTML = `
                <div style="flex-grow: 1">
                    ${name} x${item.quantity} (Rp ${(item.price * item.quantity).toLocaleString()})
                </div>
                <div>
                    <button onclick="decreaseItem('${name}')">−</button>
                    <button onclick="increaseItem('${name}')">+</button>
                    <button onclick="removeItem('${name}')"><i class="fas fa-trash"></i></button>
                </div>
            `;
            cartItemsContainer.appendChild(itemDiv);
        }
        document.getElementById('cart-total').textContent = cart.total.toLocaleString();
    }


    function increaseItem(name) {
        cart.items[name].quantity++;
        cart.total += cart.items[name].price;
        updateCartDisplay();
    }

    function decreaseItem(name) {
        if (cart.items[name].quantity > 1) {
            cart.items[name].quantity--;
            cart.total -= cart.items[name].price;
        } else {
            removeItem(name); 
            return;
        }
        updateCartDisplay();
    }

    function removeItem(name) {
        cart.total -= cart.items[name].price * cart.items[name].quantity;
        delete cart.items[name];
        updateCartDisplay();
    }


    function checkoutCart() {
        if (cart.total === 0) {
            alert('Keranjang kosong!');
        } else {
            localStorage.setItem('checkoutCart', JSON.stringify(cart));
            window.location.href = "/pesanan/baru";
        }
    }
</script>
@endsection