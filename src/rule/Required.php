<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Required extends AbstractRule
{

    public static function validate()
    {
        return (!is_null(self::$input) && (trim(self::$input) != ''));
    }

}