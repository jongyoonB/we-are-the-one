<?php

class Follow extends CI_Model
{
    public $u_num = null;
    public $fol_u_num = null;
    public $follow_idx = null;

    function __construct()
    {
        parent::__construct();
    }

    function set($value)
    {
        $this->u_num = isset($value['u_num']) ? $value['u_num'] : null;
        $this->fol_u_num = isset($value['fol_u_num']) ? $value['fol_u_num'] : null;
        $this->follow_idx = isset($value['follow_idx']) ? $value['follow_idx'] : null;
    }
}
