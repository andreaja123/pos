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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable(); // Auto-generated
            $table->string('barcode')->nullable()->unique();
            $table->integer('barcode_digits')->default(13);

            // Harga & Pajak
            $table->decimal('cost_price', 15, 2)->default(0);
            $table->decimal('sell_price', 15, 2)->default(0);
            $table->decimal('tax_rate', 5, 2)->default(0);
            $table->decimal('discount_rate', 5, 2)->default(0);

            // Relasi
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('subcategory_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('default_warehouse_id')->nullable()->constrained('warehouses')->nullOnDelete();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 5. Product Variants
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('brand')->nullable(); // Merek
            $table->string('color')->nullable(); // Warna
            $table->string('size')->nullable();  // Ukuran
            $table->integer('stock_alert')->default(0); // Peringatan Kuantitas
            $table->integer('stock')->default(0); // Unit Stok (Simple tracking)
            $table->timestamps();
        });

        // 6. Product Stocks (Stok per Gudang)
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('warehouse_id')->constrained()->cascadeOnDelete();
            $table->integer('quantity')->default(0);
            $table->integer('alert_limit')->default(5);
            $table->timestamps();
        });

        // 7. Product Images
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('image_path');
            $table->boolean('is_primary')->default(false);
            $table->timestamps();
        });

        // 8. Product Serials
        Schema::create('product_serials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('serial_number');
            $table->string('status')->default('available'); // available, sold
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_serials');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_stocks');
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('products');
    }
};