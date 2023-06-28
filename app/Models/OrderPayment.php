<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;



    public static array $types = [
        'Оплата після отримання',
        'Оплата картою',

    ];
}
