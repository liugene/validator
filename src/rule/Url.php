<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Url extends AbstractRule
{

    public static function validate()
    {
        return filter_var(self::$input, FILTER_VALIDATE_URL);
    }

}