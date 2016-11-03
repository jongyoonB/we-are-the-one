<?php

class like_board_php
{
    public $u_num = null;
    public $b_con_idx = null;
    public $like_idx = null;

    function __construct($value)
    {
        $this->u_num = isset($value['u_num']) ? $value['u_num'] : null;
        $this->b_con_idx = isset($value['b_con_idx']) ? $value['b_con_idx'] : null;
        $this->like_idx = isset($value['like_idx']) ? $value['like_idx'] : null;
    }
}
