<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
</head>
<body>

  <div class="text-center mt-5">
    <h2 style="color: #3e2723; font-weight:bold;">Masuk ke Akun Anda</h2>
    <p>Silahkan masuk menggunakan akun yang sudah terdaftar</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-start">
                   <form action="{{ route('login.submit') }}" method="post" autocomplete="off">
                    @csrf
                    <label>Username</label>
                    <input type="text" name="username" class="form-control mb-2" placeholder="Masukkan Username">
                    <label>Kata Sandi</label>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Masukkan Sandi">
                    <button class="btn btn-primary">Masuk</button>
                   </form>

                   @if(session('gagal'))
                    <p class="text-danger mt-2">{{ session('gagal') }}</p>
                   @endif
                </div>
            </div>
        </div>
    </div>
  </div>
    
</body>
</html>