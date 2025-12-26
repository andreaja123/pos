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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->string('po_reference')->nullable();
            $table->date('invoice_date');
            $table->date('due_date')->nullable();
            
            // Data Pelanggan (Disimpan langsung agar snapshot data terjaga)
            $table->string('customer_name')->nullable(); // Bisa link ke tabel customers jika ada
            $table->text('customer_address')->nullable();
            
            // Keuangan
            $table->decimal('global_tax_percent', 5, 2)->default(0);
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('total_tax', 15, 2)->default(0);
            $table->decimal('total_item_discount', 15, 2)->default(0);
            $table->decimal('shipping_cost', 15, 2)->default(0);
            $table->decimal('additional_discount', 15, 2)->default(0);
            $table->decimal('grand_total', 15, 2)->default(0);
            
            // Catatan & Status
            $table->string('admin_note')->nullable();
            $table->text('customer_note')->nullable();
            $table->enum('status', ['draft', 'published', 'paid', 'cancelled'])->default('draft');
            
            $table->timestamps();
        });
    
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            $table->string('item_name');
            $table->text('description')->nullable();
            $table->integer('qty');
            $table->decimal('unit_price', 15, 2);
            $table->decimal('tax_percent', 5, 2)->default(0);
            $table->decimal('discount_percent', 5, 2)->default(0); // Diskon per item dalam %
            $table->decimal('amount', 15, 2); // Total baris setelah hitungan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};