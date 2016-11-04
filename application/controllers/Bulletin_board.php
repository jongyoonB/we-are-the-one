<?php

class Bulletin_board extends CI_Controller
{
    public $b_category = '';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        /*        $board_model = $this->loadModel('bulletin_board_model');
                $board_list = $board_model->get_Board_List($this->b_category)*/;
        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/index3');
        $this->load->view('_templates/footer3');

    }

    function boring()
    {
        $this->b_category = '1';

        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/timeline');
        $this->load->view('_templates/footer3');
    }

    function hungry()
    {
        $this->b_category = '2';

        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/timeline');
        $this->load->view('_templates/footer3');
    }

    function boring_matching()
    {
        $this->b_category = '1';
        $this->load->model('bulletin_board_model');
        $this->load->model('pe_model');
        $data['pe_list'] = $this->pe_model->get_Pe_List($this->b_category);

        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/matching', $data);
        $this->load->view('_templates/footer3');
    }

    function hungry_matching()
    {
        $this->b_category = '2';
        $this->load->model('bulletin_board_model');
        $this->load->model('pe_model');
        $data['pe_list'] = $this->pe_model->get_Pe_List($this->b_category);

        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/matching', $data);
        $this->load->view('_templates/footer3');
    }

    function match()
    {
        $this->load->model('bulletin_board_model');
        $this->load->model('member_model');
        $this->load->model('pe_model');

        $data = null;

        $startdate = date('Y-m-d') . " ";
        $startdate .= isset($_POST['startdate']) ? $_POST['startdate'] : null;
        $startdate .= ":00";
        $category = isset($_POST['category']) ? $_POST['category'] : null;

        $check_already_join = $this->pe_model->check_already_join($_SESSION['user_info']->u_num, $startdate);
        //$check_already_join = $pe_model->check_already_join('5', $startdate);

        if ($check_already_join == -1) {

            echo "<script>alert('해당 시간에 이미 조인 중')</script>";
            echo "<script>window.history.back();</script>";
        } else {
            $pe_category_idx = $this->pe_model->get_Pe_category_idx($category);
            $pe_category_idx = $pe_category_idx->pe_category_idx;
            //$check_group_exists = $pe_model->check_group_exists($pe_category_idx, $startdate);
            $available_group_list = $this->pe_model->available_group_list($pe_category_idx, $startdate);

            //available group exists
            if ($available_group_list) {
                //random using available list
                shuffle($available_group_list);
                $assign_group_idx = $available_group_list[0]->pe_group_idx;


            } //available group not exists create new one
            else {
                $assign_group_idx = $this->pe_model->new_group($pe_category_idx, $startdate);
            }

            $this->pe_model->assign_group($assign_group_idx, $_SESSION['user_info']->u_num);
            //$pe_model->assign_group($assign_group_idx, '5');

            $data['group_info'] = $this->pe_model->get_group_info($assign_group_idx);
            $data['group_category_name'] = $this->pe_model->get_Pe_category_name($data['group_info']->pe_group_category);
        }

        $this->load->view('_templates/header3');

        if ($check_already_join != -1) {
            $this->load->view('bulletin_board/matching', $data);

        }
        $this->load->view('_templates/footer3');
    }

    function curious()
    {
        $this->b_category = '3';

        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/timeline');
        $this->load->view('_templates/footer3');
    }

    function uncomfortable()
    {
        $this->b_category = '4';

        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/uncomfortable');
        $this->load->view('_templates/footer3');
    }

    function my_Matching()
    {
        $this->load->model('bulletin_board_model');
        $data['matching_info'] = $this->bulletin_board_model->get_matching_Info($_SESSION['user_info']->u_num);

        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/my_Matching' , $data);
        $this->load->view('_templates/footer3');
    }

    function uncomfortable_View($b_con_idx)
    {
        $b_category = '4';
        $this->load->model('bulletin_board_model');
        $data['b_Arr'] = $this->bulletin_board_model->get_Board_One($b_con_idx);

        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/uncomfortable_View',$data);
        $this->load->view('_templates/footer3');
    }

    function user_Select()
    {
        $this->b_category = '5';
        $this->load->model('member_model');
        $data['s_u_nick'] = $this->member_model->select_u_num_By_u_nick($_POST['s_u_nick']);

        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/timeline' , $data);
        $this->load->view('_templates/footer3');
    }

    function user_Select_num($num){
	$this->b_category = '5';
        $this->load->model('member_model');
        $data['s_u_nick'] = $this->member_model->select_u_num_By_u_num($num);

        $this->load->view('_templates/header3');
        $this->load->view('bulletin_board/timeline' , $data);
        $this->load->view('_templates/footer3');

    }

    function b_plus()
    {
        $this->load->model('bulletin_board_model');
        $this->load->model('table/board');
        if ($_FILES['b_pic']['name'][0] == "")
            $_POST['attach'] = 0;
        else
            $_POST['attach'] = 1;

        $this->board->set($_POST);

        $b_con_idx = $this->bulletin_board_model->insert_Board($this->board);

        if ($_POST['attach']) {
            $files = $this->bulletin_board_model->sort_Files($_FILES);
            for ($i = 0; $i < count($files); $i++) {
                $this->bulletin_board_model->pic_Upload($files[$i], $b_con_idx);
            }
        }

        if ($_POST['category'] == '1')
            header("location:" . URL . "bulletin_board/boring/");
        else if ($_POST['category'] == '2')
            header("location:" . URL . "bulletin_board/hungry/");
        else if ($_POST['category'] == '3')
            header("location:" . URL . "bulletin_board/curious/");
    }

}
