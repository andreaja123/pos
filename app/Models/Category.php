<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
        'is_active',
    ];

    /* ================= RELATIONS ================= */

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /* ================= ACCESSORS ================= */

    public function getCategoryTypeAttribute(): string
    {
        return $this->parent_id ? 'Sub Category' : 'Main Category';
    }

    public function getKelayakanAttribute(): array
    {
        $percentage = $this->kelayakan_persen;

        if ($percentage >= 80) {
            return ['label' => 'Sangat Layak', 'color' => 'emerald'];
        }

        if ($percentage >= 50) {
            return ['label' => 'Cukup', 'color' => 'amber'];
        }

        return ['label' => 'Overstock', 'color' => 'red'];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }
}