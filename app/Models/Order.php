<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'subtotal',
        'tax',
        'tax_rate',
        'shopping_fee',
        'shipping_to',
        'total',
        'shipping_address',
        'extra_shipping_info',
        'profile',
    ];
}
