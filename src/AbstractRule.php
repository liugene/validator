<?php

namespace linkphp\validator;

abstract class AbstractRule
{

    public $input;

    public $length;

    public $param;

    abstract public function validate();

}