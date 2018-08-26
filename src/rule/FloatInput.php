<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class FloatInput extends AbstractRule
{

    public function validate()
    {
        return is_float($this->input) || ($this->input == (string)(float)$this->input);
    }

}