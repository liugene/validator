<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class AlphaNumeric extends AbstractRule
{

    public static function validate()
    {
        return (preg_match("#^[a-zA-ZÀ-ÿ0-9]+$#", self::$input) == 1);
    }

}