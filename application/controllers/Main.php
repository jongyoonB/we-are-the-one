<?php

class Main extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->view('_templates/header3');
        $this->load->view('main/index');
        $this->load->view('_templates/footer3');
    }


    function chat(){
	$u_pic = chop(URL,'/').$_SESSION['user_info']->u_pic;
	$memcache = new Memcache;
        $memcache->connect('jycom.asuscomm.com', 11211);
        $memcache->set('u_nick', $_SESSION['user_info']->u_nick, 0 ,0);
        $memcache->set('u_num', $_SESSION['user_info']->u_num, 0 ,0);
        $memcache->set('u_pic', $u_pic, 0 ,0);
        $memcache->set('room', $_SESSION['user_info']->college_num, 0 ,0);

/*	$this->load->helper('cookie');

	set_cookie('u_nick',  $_SESSION['user_info']->u_nick, 0, '.jycom.asuscomm.com');
        set_cookie('u_pic',  $_SESSION['user_info']->u_pic, 0, '.jycom.asuscomm.com');
        set_cookie('u_num',  $_SESSION['user_info']->u_num, 0, '.jycom.asuscomm.com');
        set_cookie('room',  $_SESSION['user_info']->college_num, 0, '.jycom.asuscomm.com');*/
	
	$this->load->view('_templates/header3');
        $this->load->view('main/index');
        $this->load->view('_templates/footer3');
    }

    function chat_v2($room){
        $u_pic = chop(URL,'/').$_SESSION['user_info']->u_pic;
	$room = "pe".$room;
        $memcache = new Memcache;
        $memcache->connect('jycom.asuscomm.com', 11211);
        $memcache->set('u_nick', $_SESSION['user_info']->u_nick, 0 ,0);
        $memcache->set('u_num', $_SESSION['user_info']->u_num, 0 ,0);
        $memcache->set('u_pic', $u_pic, 0 ,0);
        $memcache->set('room', $room, 0 ,0);

        $this->load->view('_templates/header3');
        $this->load->view('main/index');
        $this->load->view('_templates/footer3');
    }


}
