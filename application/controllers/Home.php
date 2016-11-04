<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->model('member_model');
        $data['college_list'] = $this->member_model->college_list();
        $data['interest_list'] = $this->member_model->interest_list();
        $this->load->view('_templates/header2');
        $this->load->view('home/index',$data);
        $this->load->view('_templates/footer2');
    }
}