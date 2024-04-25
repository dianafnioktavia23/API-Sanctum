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
            $table->id();
            $table->string("nama_pengunjung");
            $table->unsignedBigInteger("meja_id")->nullable(); // Menggunakan nullable() untuk foreign key
            $table->unsignedBigInteger("menu_id")->nullable(); // Menggunakan nullable() untuk foreign key
            $table->integer("jumlah")->nullable(); // Mengubah tipe data menjadi integer
            $table->decimal("subtotal", 10, 2)->nullable(); // Mengubah tipe data menjadi decimal
            $table->timestamp("tanggal_pemesanan")->nullable(); // Menggunakan timestamp() tanpa argumen
            $table->enum("status", ["pending", "completed", "cancelled"])->default("pending"); // Menambahkan nilai default dan enum values
            $table->timestamps(); // Untuk created_at dan updated_at

            $table->foreign("meja_id")->references("id")->on("meja")->onDelete("set null"); // Menetapkan foreign key dan aksi saat penghapusan
            $table->foreign("menu_id")->references("id")->on("menu")->onDelete("set null"); // Menetapkan foreign key dan aksi saat penghapusan
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
