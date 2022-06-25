<?php

namespace TheSource\Domain\ValueObjects;

enum PersonGender: string
{
    case Male = 'male';
    case Female = 'female';
    case NonBinary = 'non-binary';

    public static function getValues(): array
    {
        $cases = self::cases();
        $values = array_column($cases, 'value');
        return $values;
    }
}
