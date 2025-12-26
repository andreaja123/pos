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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name')->nullable();
            $table->decimal('value', 12, 2)->default(0);
            $table->enum('value_type', ['fixed', 'percent'])->default('fixed');
            $table->integer('quantity')->default(1);
            $table->integer('used_count')->default(0);
            $table->date('valid_until')->nullable();
            $table->foreignId('account_id')->nullable()->constrained('customers')->nullOnDelete();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
