<?php

namespace App\Enum;

enum BillType: string
{
    use ArrayEnum;

    const BILL = 'Bill';
    const DEPOSIT = 'Deposit';
}
