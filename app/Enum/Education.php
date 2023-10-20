<?php

namespace App\Enum;

enum Education: string
{
    use ArrayEnum;

    const None = 'Tidak Ada';
    const SD_MI = 'SD/MI';
    const SMP_MTs = 'SMP/MTs';
    const SMA_MA_SMK = 'SMA/MA/SMK';
    const D1 = 'D1';
    const D2 = 'D2';
    const D3 = 'D3';
    const D4 = 'D4';
    const S1 = 'S1';
    const S2 = 'S2';
    const S3 = 'S3';
}
