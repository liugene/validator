<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Alpha extends AbstractRule
{

    public static function validate()
    {
        return (preg_match("#^[a-zA-ZÀ-ÿ]+$#", self::$input) == 1);
    }

}