<?php

namespace TheSource\Domain\ValueObjects;

enum PersonGender: string
{
    case Male = 'male';
    case Female = 'female';
    case NonBinary = 'non-binary';
}
