<?php

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
    }

    function verify($email, $hash)
    {
        $this->load->model('member_model');
        $this->member_model->verifying_email($email, $hash);
        header("location:" . URL);
    }


   /* function signUp_Page()
    {
        $member_model = $this->loadModel('member_model');
        $college_list = $member_model->college_list();
        $interest_list = $member_model->interest_list();

        require "application/views/_templates/header.php";
        require "application/views/member/signUp.php";
        require "application/views/_templates/footer.php";
    }*/


    function signUp()
    {
        $this->load->model('member_model');
        $this->load->model('table/user');
        $this->user->set($_POST);
        $ai = $this->member_model->get_Ai();
        $this->load->model('mail_model');
        $what = $this->member_model->signUp_member($this->user);
        $verify = $this->member_model->get_verify_info($ai);

        if ($what) {
            $this->member_model->insert_interest_u($_POST['interest_Arr'], $ai);

            //이미지 추가
            if ($dir = $this->member_model->pic_Upload($_FILES['u_pic'], $ai)) {
                $this->member_model->member_pic_update($ai, $dir);
            }

            $from = "nore_ply@wearetheone.com";
            $to = $verify->u_email; // Send email to our user
            $subject = 'Signup | Verification'; // Give the email a subject
            $body = '

		        가입해 주셔서 감사합니다!
                        귀하의 계정이 생성 되었습니다, 링크를 눌러 계정을 활성화 해 주세요.
                        아래의 링크를 눌러 계정을 활성화 해 주십시오
                        http://jycom.asuscomm.com:6680/member/verify/' . $verify->u_email . '/' . $verify->hash; // Our message above including the link

            $this->mail_model->send_mail($to, $from, $subject, $body);

            //header("location:" . URL);
            $url = URL;
            echo "<script>location.href='" . $url . "'</script>";
        } else {

            header("location:" . URL . "member/signUp_Page");
        }

    }


    /*function signIn_Page()
    {
        require "application/views/_templates/header.php";
        require "application/views/member/signIn.php";
        require "application/views/_templates/footer.php";
    }*/


    function signIn()
    {
        $this->load->model('member_model');
        $this->load->model('table/user');
        $this->user->set($_POST);
        $user_info = $this->member_model->signIn_Check($this->user);

        if ($user_info->u_nick) {
            if ($user_info->activate == 1) {
                $_SESSION['user_info'] = $user_info;
		 $u_pic = chop(URL,'/').$_SESSION['user_info']->u_pic;
	         $memcache = new Memcache;
	         $memcache->connect('jycom.asuscomm.com', 11211);
	         $memcache->set('u_nick', $_SESSION['user_info']->u_nick, 0 ,0);
	         $memcache->set('u_num', $_SESSION['user_info']->u_num, 0 ,0);
	         $memcache->set('u_pic', $u_pic, 0 ,0);
	         $memcache->set('room', $_SESSION['user_info']->college_num, 0 ,0);

                header("location:" . URL);
            } else {

                header("location:" . URL);
            }
            header("location:" . URL);
        } else {
            header("location:" . URL);
        }
    }

    function signOut()
    {
        unset($_SESSION['user_info']);

        header("location:" . URL);
    }

    function img_Update()
    {
        $this->load->model('member_model');
        $this->member_model->img_Update($_FILES, $_SESSION['user_info']);

        header("location:" . URL);
    }


    function member_update()
    {
        $this->load->model('member_model');
        $this->load->model('table/user');
        $this->user->set($_POST);

        $this->member_model->member_Update($this->user, $_SESSION['user_info']->u_num);

        $this->member_model->del_interest_u($_SESSION['user_info']->u_num);
        $this->member_model->insert_interest_u($_POST['interest_Arr'], $_SESSION['user_info']->u_num);
        if (!$_FILES['u_pic']['error'] && $_FILES['u_pic']) {
            $this->member_model->img_Update($_FILES['u_pic'], $this->user);
        }

        $a = $this->member_model->sgoi($_SESSION['user_info']->u_num);
        unset($_SESSION['user_info']);
        $_SESSION['user_info'] = $a;
        header("location:" . URL);
    }


    function follow_page()
    {
        $this->load->model('member_model');
        $t = $this->member_model->follower_select($_SESSION['user_info']->u_num);
        $data['f_list'] = $this->member_model->college_follow_select($_SESSION['user_info']->college_num, $t, $_SESSION['user_info']->u_num);
	$data['u_list'] = $this->member_model->u_interest_list();
        $this->load->view('_templates/header3');
        $this->load->view('member/follow_page',$data);
        $this->load->view('_templates/footer3');
    }

    function follow_user()
    {
        $this->load->model('member_model');
        $this->member_model->follower_Insert($_SESSION['user_info']->u_num, $_POST['u_num']);

        header("location:" . URL . "member/follow_page/");
    }

    function user_Select()
    {
        $_REQUEST['s_u_nick'];
    }


}
