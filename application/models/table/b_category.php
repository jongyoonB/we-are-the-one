<?php

class B_category extends CI_Model
{
    public $b_category_num = null;
    public $b_category_name = null;

    function __construct()
    {
        parent::__construct();
    }

    function set($value)
    {
        $this->b_category_num = isset($value['b_category_num']) ? $value['b_category_num'] : null;
        $this->b_category_name = isset($value['b_category_name']) ? $value['b_category_name'] : null;
    }
}