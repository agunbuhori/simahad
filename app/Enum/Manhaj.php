<?php

namespace App\Enum;

enum Manhaj: string
{
    use ArrayEnum;

    const Salaf = 'Salaf';
    const Belajar_Salaf = 'Belajar Salaf';
    const Nahdlatul_Ulama = 'Nahdlatul Ulama';
    const Muhammadiyah = 'Muhammadiyah';
    const Persis = 'Persis';
    const Wahdah_Islamiyah = 'Wahdah Islamiyah';
    const Lainnya = 'Lainnya';
    const Mualaf = 'Mualaf';
    const Tidak_Tahu = 'Tidak Tahu';
}
