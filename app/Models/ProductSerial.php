<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSerial extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'serial_number',
        'status', // 'available', 'sold', 'returned', 'defective'
    ];

    /**
     * Relasi ke Produk Utama
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Scope: Ambil hanya serial number yang statusnya 'available'
     * Cara Pakai: ProductSerial::available()->get();
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    /**
     * Scope: Ambil hanya serial number yang sudah terjual
     * Cara Pakai: ProductSerial::sold()->get();
     */
    public function scopeSold($query)
    {
        return $query->where('status', 'sold');
    }
}