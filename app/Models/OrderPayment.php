<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;



    public static array $types = [
        'Payment upon receipt of goods',
        'Pay now',
        'PrivatPay',

    ];
}
