<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MakananController extends Controller
{
    function tampil() {
        return view('makanan.tampil', ['makanan' => Makanan::all()]);
    }

    function Daftar_Menu() {
        $makanan = Makanan::where('Jenis_Makanan', 'Makanan')->where('tersedia', 1)->get();
        $minuman = Makanan::where('Jenis_Makanan', 'Minuman')->where('tersedia', 1)->get();
        $promo   = Makanan::where('Jenis_Makanan', 'promo')->where('tersedia', 1)->get();
    
        return view('Daftar_Menu', compact('makanan', 'minuman', 'promo'));
    }

    function tambah() {
        return view('makanan.tambah');
    }

    function submit(Request $request) {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Nama_Makanan' => 'required',
            'Jenis_Makanan' => 'required',
            'Deskripsi' => 'required',
            'Harga' => 'required',
            'Stok' => 'required',
        ]);

        Makanan::create([
            'Nama_Makanan' => $request->Nama_Makanan,
            'Jenis_Makanan' => $request->Jenis_Makanan,
            'Deskripsi' => $request->Deskripsi,
            'Harga' => $request->Harga,
            'Stok' => $request->Stok,
            'Gambar' => $request->file('gambar')->store('uploads', 'public'),
        ]);

        return redirect()->route('makanan.tampil')->with('success', 'Data berhasil dimasukkan!');
    }

    function edit($id) {
        return view('makanan.edit', ['makanan' => Makanan::findOrFail($id)]);
    }

    function update(Request $request, $id) {
        $makanan = Makanan::findOrFail($id);
    
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'tersedia' => 'required|boolean',
        ]);
    
        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($makanan->Gambar);
            $makanan->Gambar = $request->file('gambar')->store('uploads', 'public');
        }
    
        $makanan->update($request->only(['Nama_Makanan', 'Jenis_Makanan', 'Deskripsi', 'Harga', 'Stok']));
        $makanan->tersedia = $request->tersedia;
        $makanan->save();
    
        return redirect()->route('makanan.tampil')->with('update', 'Data berhasil diupdate!');
    }
    

    function delete($id) {
        $makanan = Makanan::findOrFail($id);
        Storage::disk('public')->delete($makanan->Gambar);
        $makanan->delete();

        return redirect()->route('makanan.tampil');
    }

    function detail($id) {
        return view('makanan.detail', ['makanan' => Makanan::findOrFail($id)]);
    }

    public function tambahStok(Request $request, $id) {
        $makanan = Makanan::findOrFail($id);
        $makanan->Stok += $request->jumlah;
        $makanan->save();

        return redirect()->back()->with('success', 'Stok berhasil ditambahkan!');
    }
}
