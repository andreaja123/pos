<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'supplier_id',
        'warehouse_id',
        'reference_no',
        'order_date',
        'due_date',
        'note',
        'subtotal',
        'total_tax',
        'total_discount',
        'shipping_cost',
        'grand_total',
        'update_stock',
        'status',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }
}
