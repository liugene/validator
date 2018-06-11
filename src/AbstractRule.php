<?php

namespace linkphp\validator;

abstract class AbstractRule
{

    public static $input;

    public static $length;

    public static $param;

    abstract static public function validate();

}