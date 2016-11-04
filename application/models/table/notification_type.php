<?php

class Notification_type extends CI_Model
{
    public $noti_type_num = null;
    public $noti_type = null;

    function __construct()
    {
        parent::__construct();
    }

    function set($value)
    {
        $this->noti_type_num = isset($value['noti_type_num']) ? $value['noti_type_num'] : null;
        $this->noti_type = isset($value['noti_type']) ? $value['noti_type'] : null;
    }
}
