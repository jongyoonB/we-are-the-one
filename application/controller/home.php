<?php

class home extends Controller
{
    function index()
    {
        $member_model = $this->loadModel('member_model');
        $college_list = $member_model->college_list();
        $interest_list = $member_model->interest_list();

        require "application/views/_templates/header2.php";
        require "application/views/home/index.php";
        require "application/views/_templates/footer2.php";
    }
}