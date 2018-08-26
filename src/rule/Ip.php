<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Ip extends AbstractRule
{

    public function validate()
    {
        return filter_var($this->input, FILTER_VALIDATE_IP);
    }

}