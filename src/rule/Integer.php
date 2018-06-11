<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Integer extends AbstractRule
{

    public static function validate()
    {
        return is_int(self::$input) || (self::$input == (string)(int)self::$input);
    }

}