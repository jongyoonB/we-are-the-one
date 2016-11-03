<?php

class notification_type
{
    public $noti_type_num = null;
    public $noti_type = null;


    function __construct($value)
    {
        $this->noti_type_num = isset($value['noti_type_num']) ? $value['noti_type_num'] : null;
        $this->noti_type = isset($value['noti_type']) ? $value['noti_type'] : null;
    }
}
