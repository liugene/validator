<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Alpha extends AbstractRule
{

    public function validate()
    {
        return (preg_match("#^[a-zA-ZÀ-ÿ]+$#", $this->input) == 1);
    }

}