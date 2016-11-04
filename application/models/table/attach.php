<?php

class Attach extends CI_Model
{
    public $attach_idx = null;
    public $file_type_num = null;
    public $attach_name = null;
    public $b_con_idx = null;

    function __construct()
    {
        parent::__construct();
    }

    function set($value)
    {
        $this->attach_idx = isset($value['attach_idx']) ? $value['attach_idx'] : null;
        $this->file_type_num = isset($value['file_type_num']) ? $value['file_type_num'] : null;
        $this->attach_name = isset($value['attach_name']) ? $value['attach_name'] : null;
        $this->b_con_idx = isset($value['b_con_idx']) ? $value['b_con_idx'] : null;
    }
}