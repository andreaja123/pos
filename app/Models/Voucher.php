<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'value',
        'value_type',
        'quantity',
        'used_count',
        'valid_until',
        'account_id',
        'active',
    ];

    protected $casts = [
        'valid_until' => 'date',
        'active' => 'boolean',
    ];

    public function account()
    {
        return $this->belongsTo(Customer::class, 'account_id');
    }
}
