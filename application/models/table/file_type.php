<?php

class file_type
{
    public $file_type_num = null;
    public $file_path_info = null;


    function __construct($value)
    {
        $this->file_type_num = isset($value['file_type_num']) ? $value['file_type_num'] : null;
        $this->file_path_info = isset($value['file_path_info']) ? $value['file_path_info'] : null;
    }
}
