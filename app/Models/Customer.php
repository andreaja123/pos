<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Customer extends Model
{
    protected $fillable = [
        'group_id',
        'name',
        'company',
        'phone',
        'email',
        'billing_address',
        'billing_city',
        'billing_state',
        'billing_country',
        'billing_postcode',
        'shipping_name',
        'shipping_phone',
        'shipping_email',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_country',
        'shipping_postcode'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
