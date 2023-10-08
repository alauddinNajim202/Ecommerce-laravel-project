<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'Shipping_phoneNumber',
        'Shipping_cityName',
        'Shipping_postalcode',
        'product_id',
        'quantity',
        'price',

    ];
}
