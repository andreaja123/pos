<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'po_reference',
        'invoice_date',
        'due_date',
        'customer_name',
        'customer_address',
        'subtotal',
        'total_tax',
        'shipping_cost',
        'additional_discount',
        'grand_total',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
