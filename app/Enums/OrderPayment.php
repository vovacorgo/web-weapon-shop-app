<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderPayment extends Enum
{
    public const CASH = 'Оплата по отриманню';
    public const BANK_TRANSFER = 'Банківський переказ';
}
