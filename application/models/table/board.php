<?php

class board
{
    public $b_con_idx = null;
    public $u_num = null;
    public $b_category_num = null;
    public $college_num = null;
    public $b_subject = null;
    public $b_content = null;
    public $b_date = null;
    public $attach = null;
    public $ls_html = null;
    public $like_count = null;

    function __construct($value)
    {
        $this->b_con_idx = isset($value['b_con_idx']) ? $value['b_con_idx'] : null;
        $this->u_num = isset($value['u_num']) ? $value['u_num'] : null;
        $this->b_category_num = isset($value['b_category_num']) ? $value['b_category_num'] : null;
        $this->college_num = isset($value['college_num']) ? $value['college_num'] : null;
        $this->b_subject = isset($value['b_subject']) ? $value['b_subject'] : null;
        $this->b_content = isset($value['b_content']) ? $value['b_content'] : null;
        $this->b_date = isset($value['b_date']) ? $value['b_date'] : null;
        $this->attach = isset($value['attach']) ? $value['attach'] : null;
        $this->ls_html = isset($value['ls_html']) ? $value['ls_html'] : null;
        $this->like_count = isset($value['like_count']) ? $value['like_count'] : null;
    }
}
