<?php

namespace App\Enum;

enum DayName: string
{
    use ArrayEnum;

    const SUNDAY = 'Ahad';
    const MONDAY = 'Senin';
    const TUESDAY = 'Selasa';
    const WEDNESDAY = 'Rabu';
    const THURSDAY = 'Kamis';
    const FRIDAY = 'Jumat';
    const SATURDAY = 'Sabtu';
}
