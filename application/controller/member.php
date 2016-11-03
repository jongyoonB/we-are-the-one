<?php

class member extends Controller
{
    function index()
    {
    }

    function verify($email, $hash)
    {
        $member_model = $this->loadModel('member_model');
        $member_model -> verifying_email($email, $hash);
        header("location:" . URL);
    }


    function signUp_Page()
    {
        $member_model = $this->loadModel('member_model');
        $college_list = $member_model->college_list();
        $interest_list = $member_model->interest_list();

        require "application/views/_templates/header.php";
        require "application/views/member/signUp.php";
        require "application/views/_templates/footer.php";
    }


function signUp()
    {
        $member_model = $this->loadModel('member_model');
        $user_table = $this->loadTable(' user', $_POST);
        $ai = $member_model->get_Ai();
	$sendmail = $this->loadModel('mail_model');
        $what = $member_model->signUp_member($user_table);
	$verify = $member_model->get_verify_info($ai);
        if ($what) {
            $member_model->insert_interest_u($_POST['interest_Arr'] , $ai);

            //이미지 추가
            if ($dir = $member_model->pic_Upload($_FILES['u_pic'], $ai)) {
                $member_model->member_pic_update($ai, $dir);
            }
            
	        $from = "nore_ply@wearetheone.com";
	        $to = $verify->u_email; // Send email to our user
        	$subject = 'Signup | Verification'; // Give the email a subject
	        $body = '

		        가입해 주셔서 감사합니다!
                        귀하의 계정이 생성 되었습니다, 링크를 눌러 계정을 활성화 해 주세요.
                        아래의 링크를 눌러 계정을 활성화 해 주십시오
                        http://jycom.asuscomm.com:6680/member/verify/'.$verify->u_email.'/'.$verify->hash; // Our message above including the link
		
		        $sendmail->send_mail($to, $from, $subject, $body);

               //header("location:" . URL);
		$url = URL;
		echo "<script>location.href='".$url."'</script>";
	        }

		 else {
        	    header("location:" . URL . "member/signUp_Page");
	        }

	 }




    function signIn_Page()
    {
        require "application/views/_templates/header.php";
        require "application/views/member/signIn.php";
        require "application/views/_templates/footer.php";
    }



function signIn()
    {
        $member_model = $this->loadModel('member_model');
        $user_table = $this->loadTable('user' , $_POST);
        $user_info = $member_model->signIn_Check($user_table);



        if($user_info) {
            if ($user_info->activate == 1) {
                $_SESSION['user_info'] = $user_info;

	$v = $member_model->follower_select($_SESSION['user_info']->u_num);
        if ($v) {
            $u_list = $member_model->select_member_u_num_in($v);
            $_SESSION['f_list'] = $u_list;
        }else {
            $u_list = null;
        }





                header("location:" . URL);
            }
            else{
                header("location:" . URL . "member/signIn_Page/");
            }
        }else {
            header("location:" . URL . "member/signIn_Page/");
        }
    }

    function signOut()
    {
        unset($_SESSION['user_info']);
        unset($_SESSION['f_list']);

        header("location:" . URL);
    }

    function img_Update()
    {
        $member_model = $this->loadModel('member_model');
        $check = $member_model->img_Update($_FILES, $_SESSION['user_info']);

        header("location:" . URL);
    }


    function member_update()
    {
        $member_model = $this->loadModel('member_model');
        $user_table = $this->loadTable('user', $_POST);

        $member_model->member_Update($user_table, $_SESSION['user_info']->u_num);
        if (!$_FILES['u_pic']['error'] && $_FILES['u_pic']) {
            $member_model->img_Update($_FILES['u_pic'], $user_table);
        }

        $a = $member_model->sgoi($_SESSION['user_info']->u_num);
        unset($_SESSION['user_info']);
        $_SESSION['user_info'] = $a;
        header("location:" . URL);
    }

    function follower($member_model)
    {
        $v = $member_model->follower_select($_SESSION['user_info']->u_num);
        if ($v) {
            $u_list = $member_model->select_member_u_num_in($v);
            $_SESSION['f_list'] = $u_list;
        }else {
            $u_list = null;
        }
    }

    function followerInsert($fol_num)
    {
        $member_model = $this->loadModel("member_model");
        $member_model->follower_Insert($_SESSION['user_info']['u_num'], $fol_num);
    }

    function follow_page()
    {
        $member_model = $this->loadModel("member_model");
        $t = $member_model->follower_select($_SESSION['user_info']->u_num);
        $f_list = $member_model->college_follow_select($_SESSION['user_info']->college_num , $t , $_SESSION['user_info']->u_num);

        unset($_SESSION['f_list']);

        $v = $member_model->follower_select($_SESSION['user_info']->u_num);
        if ($v) {
            $u_list = $member_model->select_member_u_num_in($v);
            $_SESSION['f_list'] = $u_list;
        }else {
            $u_list = null;
        }

        require "application/views/_templates/header3.php";
        require "application/views/member/follow_page.php";
        require "application/views/_templates/footer3.php";
    }

    function follow_user()
    {
        $member_model = $this->loadModel("member_model");
        $member_model->follower_Insert($_SESSION['user_info']->u_num , $_POST['u_num']);

        header("location:" . URL . "member/follow_page/");
    }


}
