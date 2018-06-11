<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Equals extends AbstractRule
{

    public static function validate()
    {
        return (self::$input == self::$param);
    }

}