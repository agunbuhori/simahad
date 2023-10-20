<?php

namespace App\Enum;

enum ActivityType: string
{
    use ArrayEnum;

    const ACTIVE = 'ACTIVE';
    const INACTIVE = 'INCACTIVE';
}
