<?php

namespace App\Models;

use App\Models\Warehouse;
use App\Models\ProductImage;
use App\Models\ProductSerial;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    // Relasi ke Variants
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    // Relasi ke Stocks (Gudang)
    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    // Relasi ke Images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Relasi ke Serials
    public function serials()
    {
        return $this->hasMany(ProductSerial::class);
    }
    public function defaultWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'default_warehouse_id');
    }
}
