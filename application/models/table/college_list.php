<?php

class college_list
{
    public $college_num = null;
    public $college_name = null;

    function __construct($value)
    {
        $this->college_num = isset($value['college_num']) ? $value['college_num'] : null;
        $this->college_name = isset($value['college_name']) ? $value['college_name'] : null;
    }
}
