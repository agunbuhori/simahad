<?php

namespace App\Enum;

trait ArrayEnum
{
    public static function toArray(): array
    {
        $reflection = new \ReflectionClass(static::class);
        return $reflection->getConstants();
    }

    public static function combine(array $with = []): array
    {
        $array = self::toArray();
        return array_combine($array, count($with) === count($array) ? $with : $array);
    }
}
