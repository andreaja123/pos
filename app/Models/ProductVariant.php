<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'brand',
        'color',
        'size',
        'stock',       // Stok saat ini
        'stock_alert', // Batas peringatan stok menipis
    ];

    /**
     * Relasi ke Produk Utama
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Accessor: Mendapatkan Nama Lengkap Variasi
     * Contoh Output: "Nike - Merah - XL"
     * Cara Pakai di Blade: {{ $variant->full_name }}
     */
    public function getFullNameAttribute()
    {
        return collect([$this->brand, $this->color, $this->size])
            ->filter() // Hapus yang kosong (null/empty)
            ->join(' - ');
    }
}