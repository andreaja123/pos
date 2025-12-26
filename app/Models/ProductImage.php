<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path', // Path relatif di storage/app/public
        'is_primary', // Boolean: Gambar utama atau bukan
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    /**
     * Relasi ke Produk Utama
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Accessor: Mendapatkan URL lengkap gambar
     * Cara Pakai di Blade: <img src="{{ $image->image_url }}" />
     */
    public function getImageUrlAttribute()
    {
        // Pastikan path tidak kosong
        if ($this->image_path) {
            return Storage::url($this->image_path);
        }

        // Return placeholder jika gambar rusak/kosong (Opsional)
        return asset('assets/images/placeholder-product.png');
    }
}