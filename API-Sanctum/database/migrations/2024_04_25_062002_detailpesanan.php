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
        Schema::create('detailpesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_pesanan");
            $table->unsignedBigInteger("menu_id");
            $table->decimal("subtotal", 10, 2);
            $table->timestamps(); // Untuk created_at dan updated_at

            $table->foreign("id_pesanan")->references("id")->on("pemesanan");
            $table->foreign("menu_id")->references("id")->on("menu");
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
