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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string("nama_menu");
            $table->text("deskripsi")->nullable();
            $table->unsignedBigInteger("kategori")->nullable(); // Menggunakan unsignedBigInteger() untuk foreign key
            $table->decimal("harga", 8, 2); // Menggunakan decimal untuk harga agar lebih sesuai dengan format uang
            $table->string("gambar")->nullable();
            $table->timestamps(); // Untuk created_at dan updated_at

            $table->foreign("kategori")->references("id")->on("kategori")->onDelete("set null"); // Menetapkan foreign key dan aksi saat penghapusan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};

