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
        Schema::create('meja', function (Blueprint $table) {
            $table->id();
            $table->string("nomor_meja");
            $table->string("kapasitas")->nullable(); // Menggunakan nullable() untuk foreign key
            $table->enum("status", ["kosong", "terisi", "dipesan"])->default("kosong"); // Menambahkan nilai default dan enum values
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
