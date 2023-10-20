<?php

namespace App\Enum;

enum ActivityType: string
{
    use ArrayEnum;

    const ROUTINE = 'Kegiatan Rutin';
    const ACHIEVMENT = 'Prestasi';
    const VIOLATION = 'Pelanggaran';
    const PERMISSION = 'Izin';
}
