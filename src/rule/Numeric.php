<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Numeric extends AbstractRule
{

    public function validate()
    {
        return is_numeric($this->input);
    }

}