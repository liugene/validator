<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Numeric extends AbstractRule
{

    public static function validate()
    {
        return is_numeric(self::$input);
    }

}