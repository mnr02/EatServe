<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    function tampil() {
        return view('pesanan.order');
    }

    function baru() {
        $pesanan = new pesanan(); // kosong
        return view('pesanan.baru', compact('pesanan'));
    }
    
    function submit(Request $request) {
        $request->validate([
            'nama_customer' => 'required',
            'alamat' => 'required',
            'metode_pembayaran' => 'required',
            'total_harga' => 'required|numeric',
            'delivery' => 'required',
        ]);
        $filePath = null;

        if ($request->metode_pembayaran === 'E-money') {
            $request->validate([
                'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('bukti_pembayaran')) {
                $filePath = $request->file('bukti_pembayaran')->store('bukti', 'public');
            }
        }

        $kodeUnik = strtoupper('PSN-' . Str::random(6));
        $cart = json_decode($request->input('checkout_cart'), true);
        $daftar_menu = '';

        if ($cart && isset($cart['items']) && is_array($cart['items'])) {
            $menuList = [];
            foreach ($cart['items'] as $nama => $item) {
                $menuList[] = "{$nama} x{$item['quantity']}";
            }
            $daftar_menu = implode(', ', $menuList);
        }

        $pesanan = pesanan::create([
            'kode_pesanan' => $kodeUnik,
            'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_harga' => $request->total_harga,
            'delivery' => $request->delivery,
            'bukti_pembayaran' => $filePath,
            'daftar_menu' => $daftar_menu,
            'status' => 'baru',
        ]);
        return redirect()->route('pesanan.konfirmasi', ['kode' => $pesanan->kode_pesanan]);
}

    public function konfirmasi($kode) {
        $pesanan = Pesanan::where('kode_pesanan', $kode)->firstOrFail();
        return view('pesanan.konfirmasi', compact('pesanan'));
    }

    public function proses($id) {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 'proses';
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan sedang diproses!');
    }

    public function selesai($id) {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 'selesai';
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan selesai!');
    }

    public function tolak($id) {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 'tolak';
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan di tolak');
    }

    public function formLacak() {
        return view('pesanan.lacak_kode');
    }

    public function cariPesanan(Request $request) {
        $kode = $request->kode;
        $pesanan = Pesanan::where('kode_pesanan', $kode)->first();

        if (!$pesanan) {
            return redirect()->route('lacak.form')->with('error', 'Kode tidak ditemukan!');
        }

        return view('pesanan.lacak_detail', compact('pesanan'));
    } 
}
