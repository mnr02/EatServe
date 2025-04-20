<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Makanan;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AkunController extends Controller
{
  function tampilkanRegistrasi() {
    return view('registrasi');
  }

  function submitRegistrasi(Request $request) {
    if($request->name == 0 || $request->email == 0 || $request->password == 0 || $request->username == 0) {
      return redirect()->back()->with('gagalDaftar','Masukkan data yang lengkap');
    } else {
      $user = new User();
      $user->name = $request->name;
      $user->email= $request->email;
      $user->password = bcrypt($request->password);
      $user->username = $request->username;
      $user->save();

      return redirect()->route('admin2');
    }
  }

  function tampilkanLogin() {
    return view('login');
  }

  function submitLogin(Request $request) {
    $data = $request->only('username', 'password');

    if(Auth::attempt($data)) {
      $request->session()->regenerate();
      return redirect()->route('admin');
    } else {
      return redirect()->back()->with('gagal','Nama atau Password salah');
    }
  }

  function logout() {
    Auth::logout();
    return redirect()->route('welcome');
  }

  public function admin() {
    $lowStockItems = Makanan::where('Stok', '<', 10)->get();
    $orders = pesanan::where('status', 'masuk')->get();
    $history = Pesanan::whereIn('status', ['selesai', 'tolak'])->latest()->take(5)->get();
    $pesanan = Pesanan::whereNotIn('status', ['selesai', 'tolak'])->get();

    return view('admin', compact('lowStockItems', 'orders', 'history', 'pesanan'));
  }

  public function admin2() {
    $akun = User::All();

    return view('admin2', compact('akun'));
  }

function hapusAkun($id) {
  $akun = User::findOrFail($id);
  $akun->delete();

  return redirect()->route('admin2');
}
}
 