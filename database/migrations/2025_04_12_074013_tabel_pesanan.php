<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique();
            $table->string('nama_customer')->nullable();
            $table->text('alamat')->nullable();
            $table->string('metode_pembayaran', 50)->nullable();
            $table->integer('total_harga')->default(0);
            $table->boolean('delivery')->default(true);
            $table->string('status', 20)->default('baru'); // status: baru / diproses / selesai / dibatalkan
            $table->string('bukti_pembayaran')->nullable();
            $table->text('daftar_menu')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
        // Schema::dropIfExists('pesanan_items');
    }
};
