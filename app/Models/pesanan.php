<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = ['nama_customer', 'alamat', 'metode_pembayaran', 'total_harga', 'delivery', 'bukti_pembayaran',  'kode_pesanan', 'daftar_menu'];

}
