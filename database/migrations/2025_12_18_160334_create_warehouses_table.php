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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            // Enum sesuai frontend: Pusat Penjualan, Stok Cadangan, Karantina
            $table->enum('type', ['Pusat Penjualan', 'Stok Cadangan', 'Karantina']);
            $table->timestamps();
            $table->softDeletes(); // Wajib untuk fitur hapus (soft delete)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
