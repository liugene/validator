<?php

namespace linkphp\validator\rule;

use linkphp\validator\AbstractRule;

class Equals extends AbstractRule
{

    public function validate()
    {
        return ($this->input == $this->param);
    }

}