<?php

class Pe_category extends CI_Model
{
    public $pe_category_num = null;
    public $pe_category_name = null;

    function __construct()
    {
        parent::__construct();
    }

    function set($value)
    {
        $this->pe_category_num = isset($value['pe_category_num']) ? $value['pe_category_num'] : null;
        $this->pe_category_name = isset($value['pe_category_name']) ? $value['pe_category_name'] : null;
    }
}
