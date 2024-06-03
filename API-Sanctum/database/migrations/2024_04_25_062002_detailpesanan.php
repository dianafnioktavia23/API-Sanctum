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
        Schema::create('detailpemesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pemesanan_id");
            $table->unsignedBigInteger("menu_id");
            $table->decimal("subtotal", 10, 2);
            $table->int("jumlah");
            $table->text('keterangan')->default('{}');
            $table->timestamps(); // Untuk created_at dan updated_at

            $table->foreign("pemesanan_id")->references("pemesanan_id")->on("pemesanan");
            $table->foreign("menu_id")->references("menu_id")->on("menu");
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
