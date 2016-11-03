<?php

class b_category
{
    public $b_category_num = null;
    public $b_category_name = null;

    function __construct($value)
    {
        $this->b_category_num = isset($value['b_category_num']) ? $value['b_category_num'] : null;
        $this->b_category_name = isset($value['b_category_name']) ? $value['b_category_name'] : null;
    }
}