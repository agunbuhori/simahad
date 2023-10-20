<?php

namespace App\Enum;

enum Gender: string
{
    use ArrayEnum;

    const M = 'M';
    const F = 'F';
}
