<?php

namespace App\Enum;

enum Relationship: string
{
    use ArrayEnum;

    const FATHER = 'Father';
    const MOTHER = 'Mother';
    const SIBLING = 'Sibling';
    const UNCLE = 'Uncle';
}
