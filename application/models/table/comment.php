<?php

class Comment extends CI_Model
{
    public $c_idx = null;
    public $b_con_idx = null;
    public $c_content = null;
    public $c_date = null;
    public $u_num = null;
    public $like_count = null;


    function __construct()
    {
        parent::__construct();
    }

    function set($value)
    {
        $this->c_idx = isset($value['c_idx']) ? $value['c_idx'] : null;
        $this->b_con_idx = isset($value['b_con_idx']) ? $value['b_con_idx'] : null;
        $this->c_content = isset($value['c_content']) ? $value['c_content'] : null;
        $this->c_date = isset($value['c_date']) ? $value['c_date'] : null;
        $this->u_num = isset($value['u_num']) ? $value['u_num'] : null;
        $this->like_count = isset($value['like_count']) ? $value['like_count'] : null;
    }
}
