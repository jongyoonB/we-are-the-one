<?php

class Interest_u extends CI_Model
{
    public $in_u_num = null;
    public $in_num = null;
    public $u_num = null;

    function __construct()
    {
        parent::__construct();
    }

    function set($value)
    {
        $this->in_u_num = isset($value['in_u_num']) ? $value['in_u_num'] : null;
        $this->in_num = isset($value['in_num']) ? $value['in_num'] : null;
        $this->u_num = isset($value['u_num']) ? $value['u_num'] : null;
    }
}
