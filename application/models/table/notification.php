<?php

class notification
{
    public $noti_idx = null;
    public $u_num = null;
    public $noti_type_num = null;
    public $noti_content = null;
    public $noti_created = null;

    function __construct($value)
    {
        $this->noti_idx = isset($value['noti_idx']) ? $value['noti_idx'] : null;
        $this->u_num = isset($value['u_num']) ? $value['u_num'] : null;
        $this->noti_type_num = isset($value['noti_type_num']) ? $value['noti_type_num'] : null;
        $this->noti_content = isset($value['noti_content']) ? $value['noti_content'] : null;
        $this->noti_created = isset($value['noti_created']) ? $value['noti_created'] : null;
    }
}
