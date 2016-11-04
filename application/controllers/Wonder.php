<?php

class Wonder extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->view('_templates/header3');
        $this->load->view('curious/index');
        $this->load->view('_templates/footer3');
    }
}