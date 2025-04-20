<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    /** @use HasFactory<\Database\Factories\MahasiswaFactory> */
    use HasFactory;

    protected $table = 'makanan';//agar tidak menjadi mahasiswas

    protected $fillable = ['Nama_Makanan', 'Jenis_Makanan', 'Deskripsi', 'Harga', 'Stok', 'Gambar'];

    // Accessor untuk URL gambar
    public function getGambarUrlAttribute()
    {
        return $this->Gambar ? asset('storage/' . $this->Gambar) : null;
    }
}
