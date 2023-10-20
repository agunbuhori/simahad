<?php

namespace App\Enum;

enum SubjectType: string
{
    use ArrayEnum;

    const SUBJECT = "Mata Pelajaran";
    const LOCAL_CONTENT = "Muatan Lokal";
    const EXTRA = "Ekstrakulikuler";
}
