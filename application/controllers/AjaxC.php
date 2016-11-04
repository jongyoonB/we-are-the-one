<?php

class AjaxC extends CI_Controller
{

    /* function followSelect()
     {
         $member_model = $this->loadModel('member_model');
         $follower_Select = $member_model->follower_select($_SESSION['user_info']->u_num);
         $follow_List = $member_model->college_follow_select($_SESSION['user_info']->college_num, $follower_Select, $_SESSION['user_info']->u_num);
         echo json_encode($follow_List);

     }*/
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function followingSelect()
    {
        $this->load->model('member_model');
        $v = $this->member_model->follower_select($_SESSION['user_info']->u_num);
	//$interest_info = $this->member_model->u_interest_list();
        if ($v) {
            $u_list = $this->member_model->select_member_u_num_in($v);
            echo json_encode($u_list);
        } else
            echo $u_list = null;

    }

    function get_Board($category_Num, $a, $b)
    {
        $this->load->model('bulletin_board_model');
        if ($category_Num != '4') {
            $data['b_Val'] = $this->bulletin_board_model->get_Board_List($category_Num, $a, $b);
            $val = $this->bulletin_board_model->sort_Board_Num($data['b_Val']);
            $data['a_Val'] = $this->bulletin_board_model->get_Board_Attach($val);
        } else {
            $data['b_Val'] = $this->bulletin_board_model->get_Board_List_U_num($_SESSION['user_info']->u_num, $category_Num);
        }

        echo json_encode($data);
    }

    function get_Comment($b_idx, $a)
    {
        $this->load->model('bulletin_board_model');
        $data['c_Val'] = $this->bulletin_board_model->get_Comment($b_idx, $a);

        echo json_encode($data);
    }

    function set_Comment()
    {
        $this->load->model('bulletin_board_model');
        $this->bulletin_board_model->set_Comment($_POST['b_idx'], $_POST['comment'], $_SESSION['user_info']->u_num);
    }

    function get_Inter()
    {
        $this->load->model('member_model');
        $data = $this->member_model->get_Inter();

        echo json_encode($data);
    }

    function get_Board_List_fromUser($u_num, $a, $b)
    {
        $this->load->model('bulletin_board_model');
        $data['b_Val'] = $this->bulletin_board_model->get_Board_List_fromUser($u_num, $a, $b);
        $val = $this->bulletin_board_model->sort_Board_Num($data['b_Val']);
        $data['a_Val'] = $this->bulletin_board_model->get_Board_Attach($val);

        echo json_encode($data);
    }

}

