<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Required extends AbstractRule
{

    public function validate()
    {
        return (!is_null($this->input) && (trim($this->input) != ''));
    }

}