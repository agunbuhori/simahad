<?php

namespace App\Enum;

enum Semester: string
{
    use ArrayEnum;

    const ODD = "Ganjil";
    const EVEN = "Genap";
}
