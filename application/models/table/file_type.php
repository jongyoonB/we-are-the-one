<?php

class File_type extends CI_Model
{
    public $file_type_num = null;
    public $file_path_info = null;

    function __construct()
    {
        parent::__construct();
    }

    function set($value)
    {
        $this->file_type_num = isset($value['file_type_num']) ? $value['file_type_num'] : null;
        $this->file_path_info = isset($value['file_path_info']) ? $value['file_path_info'] : null;
    }
}
