<?php

namespace App\Enum;

enum Religion: string
{
    use ArrayEnum;

    const ISLAM = 'Islam';
    const PROTESTAN = 'Protestan';
    const KATOLIK = 'Katolik';
    const BUDDHA = 'Buddha';
    const HINDU = 'Hindu';
    const KONGHUCHU = 'Konghuchu';
    const LAINNYA = 'Lainnya';
}
