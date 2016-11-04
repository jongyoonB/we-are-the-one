<?php

class Uncomfortable extends CI_Model
{
    public $un_idx = null;
    public $u_num = null;
    public $un_subject = null;
    public $un_content = null;
    public $un_date = null;

    function __construct()
    {
        parent::__construct();
    }

    function set($value)
    {
        $this->un_idx =isset($value['un_idx']) ? $value['un_idx'] : null;
        $this->u_num =isset($value['u_num']) ? $value['u_num'] : null;
        $this->un_subject =isset($value['un_subject']) ? $value['un_subject'] : null;
        $this->un_content =isset($value['un_content']) ? $value['un_content'] : null;
        $this->un_date = isset($value['un_date']) ? $value['un_date'] : null;
    }
}
