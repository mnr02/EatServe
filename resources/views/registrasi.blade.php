<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
</head>
<body>

  <div class="text-center mt-5">
    <h2 style="color: #3e2723; font-weight:bold;">Formulir Pendaftaran Akun</h2>
    <p>Silahkan isi formulir berikut untuk melakukan pendaftaran akun</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-start">
                   <form action="{{ route('registrasi.submit') }}" method="post" autocomplete="off">
                    @csrf
                    <label>Nama lengkap</label>
                    <input type="text" name="name" class="form-control mb-2">
                    <label>Alamat E-mail </label>
                    <input type="text" name="email" class="form-control mb-2">
                    <label>username</label>
                    <input type="text" name="username" class="form-control mb-2">
                    <label>Kata Sandi</label>
                    <input type="password" name="password" class="form-control mb-2">
                    <button class="btn btn-primary">Daftar</button>
                   </form>

                   @if(session('gagalDaftar'))
                   <p class="text-danger mt-2">{{ session('gagalDaftar') }}</p>
                  @endif
                </div>
            </div>
        </div>
    </div>
  </div>
    
</body>
</html>