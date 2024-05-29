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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id("pemesanan_id");
            $table->string("nama_pengunjung");
            $table->unsignedBigInteger("meja_id")->nullable(); // Menggunakan nullable() untuk foreign key
            $table->timestamp("tanggal_pemesanan")->nullable(); // Menggunakan timestamp() tanpa argumen
            $table->enum("status", ["pending", "proses", "selesai"])->default("pending"); // Menambahkan nilai default dan enum values
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
            $table->string("keterangan");
            $table->foreign("meja_id")->references("_meja_id")->on("meja")->onDelete("set null"); // Menetapkan foreign key dan aksi saat penghapusan
            $table->foreign("menu_id")->references("menu_id")->on("menu")->onDelete("set null"); // Menetapkan foreign key dan aksi saat penghapusan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
