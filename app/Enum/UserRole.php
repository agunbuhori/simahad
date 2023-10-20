<?php

namespace App\Enum;

enum UserRole: string
{
    use ArrayEnum;

    const DEVELOPER = 'Developer';
    const HEADMASTER = 'Headmaster';
    const ADMINISTRATOR = 'Administrator';
    const FINANCE = 'Finance';
    const CURRICULUM = 'Curriculum';
    const TEACHER = 'Teacher';
    const STUDENTSHIP = 'Studentship';
}
