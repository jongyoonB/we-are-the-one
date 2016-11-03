<?php

class pe_category
{
    public $pe_category_num = null;
    public $pe_category_name = null;


    function __construct($value)
    {
        $this->pe_category_num = isset($value['pe_category_num']) ? $value['pe_category_num'] : null;
        $this->pe_category_name = isset($value['pe_category_name']) ? $value['pe_category_name'] : null;
    }
}
