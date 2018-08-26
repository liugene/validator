<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class ExactLength extends AbstractRule
{

    public function validate()
    {
        return (strlen($this->input) == $this->length);
    }

}