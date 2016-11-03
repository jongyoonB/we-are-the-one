<?php

class user
{
    public $u_num = null;
    public $u_id = null;
    public $u_pass = null;
    public $u_nick = null;
    public $u_tel = null;
    public $u_email = null;
    public $u_pic = null;
    public $u_birth = null;
    public $u_status = null;
    public $u_in_list = null;
    public $college_num = null;
    public $hash = null;
    public $activate = null;

    function __construct($value)
    {
        $this->u_num = isset($value['u_num']) ? $value['u_num'] : null;
        $this->u_id = isset($value['u_id']) ? $value['u_id'] : null;
        $this->u_pass = isset($value['u_pass']) ? $value['u_pass'] : null;
        $this->u_nick = isset($value['u_nick']) ? $value['u_nick'] : null;
        $this->u_tel = isset($value['u_tel']) ? $value['u_tel'] : null;
        $this->u_email = isset($value['u_email']) ? $value['u_email'] : null;
        $this->u_pic = isset($value['u_pic']) ? $value['u_pic'] : null;
        $this->u_birth = isset($value['u_birth']) ? $value['u_birth'] : null;
        $this->u_status = isset($value['u_status']) ? $value['u_status'] : null;
        $this->u_in_list = isset($value['u_in_list']) ? $value['u_in_list'] : null;
        $this->college_num = isset($value['college_num']) ? $value['college_num'] : null;
        $this->hash = isset($value['hash']) ? $value['hash'] : null;
        $this->activate = isset($value['activate']) ? $value['activate'] : null;
    }
}
