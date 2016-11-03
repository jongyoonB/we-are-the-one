<?php

class bulletin_board extends Controller
{
    public $b_category = '';

    function index()
    {
        /*        $board_model = $this->loadModel('bulletin_board_model');
                $board_list = $board_model->get_Board_List($this->b_category)*/;
        require "application/views/_templates/header3.php";
        require "application/views/bulletin_board/index3.php";
        require "application/views/_templates/footer3.php";

    }

    function boring(){
        $this->b_category = '1';
        $board_model = $this->loadModel('bulletin_board_model');
        $board_list = $board_model->get_Board_List($this->b_category);

        require "application/views/_templates/header3.php";
        require "application/views/bulletin_board/timeline.php";
        require "application/views/_templates/footer3.php";
    }

    function hungry(){
        $this->b_category = '2';
        $board_model = $this->loadModel('bulletin_board_model');
        $board_list = $board_model->get_Board_List($this->b_category);

        require "application/views/_templates/header3.php";
        require "application/views/bulletin_board/timeline.php";
        require "application/views/_templates/footer3.php";
    }

    function boring_matching(){
        $this->b_category = '1';
        $board_model = $this->loadModel('bulletin_board_model');
        $pe_model = $this->loadModel('pe_model');
        $pe_list = $pe_model->get_Pe_List($this->b_category);
        $board_list = $board_model->get_Board_List($this->b_category);

        require "application/views/_templates/header3.php";
        require "application/views/bulletin_board/matching.php";
        require "application/views/_templates/footer3.php";
    }

    function hungry_matching(){
        $this->b_category = '2';
        $board_model = $this->loadModel('bulletin_board_model');
        $pe_model = $this->loadModel('pe_model');
        $pe_list = $pe_model->get_Pe_List($this->b_category);
        $board_list = $board_model->get_Board_List($this->b_category);

        require "application/views/_templates/header3.php";
        require "application/views/bulletin_board/matching.php";
        require "application/views/_templates/footer3.php";
    }

    function match(){
        $board_model = $this->loadModel('bulletin_board_model');
        $member_model = $this->loadModel('member_model');
        $pe_model = $this->loadModel('pe_model');

        $startdate = date('Y-m-d')." ";
        $startdate .= isset($_POST['startdate']) ? $_POST['startdate'] : null;
        $startdate.=":00";
        $category = isset($_POST['category']) ? $_POST['category'] : null;

        $check_already_join = $pe_model->check_already_join($_SESSION['user_info']->u_num, $startdate);
        //$check_already_join = $pe_model->check_already_join('5', $startdate);

        if($check_already_join == -1){

            echo "<script>alert('해당 시간에 이미 조인 중')</script>";
            echo "<script>window.history.back();</script>";
        }

        else{
            $pe_category_idx = $pe_model->get_Pe_category_idx($category);
            $pe_category_idx = $pe_category_idx -> pe_category_idx;
            //$check_group_exists = $pe_model->check_group_exists($pe_category_idx, $startdate);
            $available_group_list = $pe_model->available_group_list($pe_category_idx, $startdate);

            //available group exists
            if($available_group_list){
                //random using available list
                shuffle($available_group_list);
                $assign_group_idx = $available_group_list[0] -> pe_group_idx;


            }

            //available group not exists create new one
            else{
                $assign_group_idx = $pe_model->new_group($pe_category_idx, $startdate);
            }

            $pe_model->assign_group($assign_group_idx, $_SESSION['user_info']->u_num);
            //$pe_model->assign_group($assign_group_idx, '5');

            $group_info = $pe_model->get_group_info($assign_group_idx);
            $group_category_name = $pe_model->get_Pe_category_name($group_info->pe_group_category);
        }


        require "application/views/_templates/header3.php";
        if($check_already_join != -1){
            require "application/views/bulletin_board/matching.php";

        }
        require "application/views/_templates/footer3.php";
    }

    function curious(){
        $this->b_category = '3';
        $board_model = $this->loadModel('bulletin_board_model');
        $board_list = $board_model->get_Board_List($this->b_category);

        require "application/views/_templates/header3.php";
        require "application/views/bulletin_board/timeline.php";
        require "application/views/_templates/footer3.php";
    }

    function uncomfortable(){
        $this->b_category = '4';
        $board_model = $this->loadModel('bulletin_board_model');
        $board_list = $board_model->get_Board_List($this->b_category);

        require "application/views/_templates/header3.php";
        require "application/views/bulletin_board/timeline.php";
        require "application/views/_templates/footer3.php";
    }

    function b_puls() {

    }

}