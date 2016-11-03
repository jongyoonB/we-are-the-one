<?php

class interest
{
    public $in_num = null;
    public $in_name = null;

    function __construct($value)
    {
        $this->in_num = isset($value['in_num']) ? $value['in_num'] : null;
        $this->in_name = isset($value['in_name']) ? $value['in_name'] : null;
    }
}
