<?php

class like_comment
{
    public $u_num = null;
    public $c_idx = null;
    public $like_co_idx = null;

    function __construct($value)
    {
        $this->u_num = isset($value['u_num']) ? $value['u_num'] : null;
        $this->c_idx = isset($value['c_idx']) ? $value['c_idx'] : null;
        $this->like_co_idx = isset($value['like_co_idx']) ? $value['like_co_idx'] : null;
    }
}
