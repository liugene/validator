<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Integer extends AbstractRule
{

    public function validate()
    {
        return is_int($this->input) || ($this->input == (string)(int)$this->input);
    }

}