<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class ExactLength extends AbstractRule
{

    public static function validate()
    {
        return (strlen(self::$input) == self::$length);
    }

}