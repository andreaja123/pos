<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Group extends Model
{
    protected $fillable = [
        'name',
        'description',
        'discount_percentage',
        'active'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
