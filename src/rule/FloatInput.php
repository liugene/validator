<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class FloatInput extends AbstractRule
{

    public static function validate()
    {
        return is_float(self::$input) || (self::$input == (string)(float)self::$input);
    }

}