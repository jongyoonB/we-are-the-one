<?php

class Member_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    function college_list()
    {
        $query = $this->db->get(TABLE_COLLEGE_LIST);

        return $query->result();
    }

    function interest_list()
    {
        $query = $this->db->get(TABLE_INTEREST);

        return $query->result();
    }


    function signUp_member($obj)
    {
        $sql = "INSERT INTO " . TABLE_USER . "(u_id , u_pass , u_nick , u_tel , u_email , u_pic , u_birth , college_num, hash, activate) ";
        $sql .= "VALUES(?,?,?,?,?,?,?,?,?,?)";
        $query = $this->db->query($sql,array($obj->u_id,$obj->u_pass,$obj->u_nick,$obj->u_tel,$obj->u_email,$obj->u_pic,$obj->u_birth,$obj->college_num,md5(rand(0, 1000)),'0'));

        return $query;

    }


    function get_verify_info($u_num)
    {
        //$sql = "select u_email, hash from user where u_num = :u_num";
        $sql = "select u_email, hash from user where u_num = ?";
        $query = $this->db->query($sql,array($u_num));
        return $query->row();
    }


    function verifying_email($email, $hash)
    {
        $sql = "select u_email, hash, activate from user WHERE u_email= ? AND hash= ? AND activate= ?";
        $query = $this->db->query($sql,array($email , $hash , 0));
        $match = $query->row();

//        if ($match != 0) {
            $sql = "UPDATE user SET activate='1' WHERE u_email= ? AND hash= ? AND activate= 0";
            $query = $this->db->query($sql,array($email,$hash));
            return 1;
//        } else {
//            return -1;
//        }

    }

    function select_u_num_By_u_num($u_num){

	$sql = "SELECT u_num FROM " .TABLE_USER . " WHERE u_num = '$u_num'";
        $query = $this->db->query($sql);

        if($query->num_rows() == 1)
        {
            return $query->row()->u_num;
        }else {
            return null;
        }
    }

    function select_u_num_By_u_nick($u_nick)
    {
        $sql = "SELECT u_num FROM " .TABLE_USER . " WHERE u_nick = '$u_nick'";
        $query = $this->db->query($sql);

        if($query->num_rows() == 1)
        {
            return $query->row()->u_num;
        }else {
            return null;
        }

    }

    function college_follow_select($col_num, $value, $u_num)
    {
        if ($value) {
            $sql = "SELECT u_num , u_tel , u_birth ,u_nick , u_pic , college_num ,u_email FROM " . TABLE_USER . " WHERE college_num = ? AND u_num NOT IN ($value , $u_num)";
        } else
            $sql = "SELECT u_num , u_tel , u_birth ,u_nick , u_pic , college_num ,u_email FROM " . TABLE_USER . " WHERE college_num = ? AND u_num NOT IN ($u_num)";

        $query = $this->db->query($sql,array($col_num));

        return $query->result();
    }

    function member_pic_update($u_num, $u_pic)
    {
        $sql = "UPDATE " . TABLE_USER . " SET u_pic = ? WHERE u_num = ?";
        $query = $this->db->query($sql , array($u_pic,$u_num));

    }

    function pic_Upload($file, $ai)
    {
        $filename = strtolower($file['name']);
        $fileType = pathinfo($filename, PATHINFO_EXTENSION);
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/public/img/u_img/";
        //$target_dir =  "/public/img/u_img/";
        $return_file = "/public/img/u_img/u_img_$ai.$fileType";
        $target_file = $target_dir . "u_img_$ai.$fileType";
        $check = $this->pic_Check($file);

        if ($check) {
            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                return $return_file;
            }
        } else {
            echo "WTF";
            return false;
        }
    }

    function pic_Check($file)
    {
        $imagecheck = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
        $imagecheck2 = array('image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png', 'image/gif', 'image/bmp', 'image/pjpeg');
        $imgpath = pathinfo($file['name']);
        $imgext = strtolower($imgpath['extension']);
        if ($file['error'] > 0) {
            switch ($file['error']) {
                case 1 :
                    echo "php.ini 파일의 upload_max_filesize 설정값을 초과";
                    break;
                case 2 :
                    echo "Form에서 설정된 MAX_FILE_SIZE 설정값을 초과";
                    break;
                case 3 :
                    echo "파일 일부만 업로드 됨";
                    break;
                case 4 :
                    echo "업로드된 파일이 없음";
                    break;
                case 5 :
                    echo "사용가능한 임시폴더가 없음";
                    break;
                case 6 :
                    echo "디스크에 저장할수 없음";
                    break;
                case 7 :
                    echo "파일 업로드가 중지됨";
                    break;
                default :
                    echo "시스템 오류";
                    break;
            }
            return false;
        } else if ($file['size'] > 5000000) {
            echo "업로드 용량 초과";
            return false;
        } else if (!in_array($imgext, $imagecheck)) {
            echo "업로드가 불가한 확장자";
            return false;
        } else if (!in_array($file['type'], $imagecheck2)) {
            echo "지정된 이미지만 허용";
            return false;
        } else
            return true;

    }

    function get_Ai()
    {
        $sql = "SELECT AUTO_INCREMENT AS ai FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'sns' AND TABLE_NAME = 'user' ";
        $query = $this->db->query($sql);
        $value = $query->row();
        return $value->ai;
    }


    function insert_interest_u($value, $ai)
    {
        for ($i = 0; $i < count($value); $i++) {
            $sql = "INSERT INTO " . TABLE_INTEREST_U . "(in_num , u_num) VALUES(? , ?)";
            $this->db->query($sql,array($value[$i],$ai));
        }
    }

    function del_interest_u($u_num)
    {
        $sql = "DELETE FROM " . TABLE_INTEREST_U . " WHERE u_num = $u_num";
        $this->db->query($sql);
    }

    function u_interest_list()
    {
	$sql = "SELECT u.u_num, u.in_num, i.in_name FROM ".TABLE_INTEREST_U." u, ".TABLE_INTEREST." i"." WHERE u.in_num = i.in_num";
	$query = $this->db->query($sql);
	return $query->result();
    }


    function signIn_Check($obj)
    {
        $sql = "SELECT u_num , u_tel , u_birth ,u_nick , u_pic , college_num ,u_email, activate FROM " . TABLE_USER . " WHERE u_id = ? AND u_pass = ? ";
        $query = $this->db->query($sql,array($obj->u_id,$obj->u_pass));
        $check = $query->row();

        return $check;
    }


    function sgoi($u_num)
    {
        $sql = "SELECT u_num , u_tel , u_birth ,u_nick , u_pic , college_num ,u_email FROM " . TABLE_USER . " WHERE u_num = ?";
        $query = $this->db->query($sql,array($u_num));

        return $query->row();
    }

    function img_Update($file, $value)
    {
        @unlink($_SERVER['DOCUMENT_ROOT'] . $value->u_pic);
        $check = $this->pic_Upload($file, $value->u_num);
        if ($check) {
            $sql = "UPDATE " . TABLE_USER . " SET u_pic = ? WHERE u_num = ?";
            $this->db->query($sql,array($check,$value->u_num));
            return true;
        } else {
            return false;
        }
    }

    function get_Inter()
    {
        $sql = "SELECT * FROM " . TABLE_INTEREST . " ORDER BY in_num";
        $query = $this->db->query($sql);

        return $query->result();
    }


    function member_Update($obj, $u_num)
    {
        $sql = "UPDATE " . TABLE_USER . " SET u_nick = ? , u_tel = ? , u_email = ? WHERE u_num = ?";
        $this->db->query($sql,array($obj->u_nick,$obj->u_tel,$obj->u_email,$u_num));
    }

    function select_member_u_num($u_num)
    {
        $sql = "SELECT * FROM " . TABLE_USER . " WHERE u_num = ?";
        $query = $this->db->query($sql , array($u_num));

        return $query->row();
    }

    function select_member_u_num_in($value)
    {
        $sql = "SELECT u_num , u_nick , u_pic , u_birth , u_tel FROM " . TABLE_USER . " WHERE u_num IN($value)";
        $query = $this->db->query($sql);

        return $query->result();
    }

    function follower_select($u_num)
    {
        $sql = "SELECT follow_idx , fol_u_num FROM " . TABLE_FOLLOW . " WHERE u_num = ? ORDER BY follow_idx DESC";
        $query = $this->db->query($sql,array($u_num));

        $value = $query->result();

        $returnValue = null;
        $qq = 0;
        if ($value) {
            foreach ($value as $a) {
                $Arr[$qq] = $a->fol_u_num;
                $qq++;
            }
            for ($i = 0; $i < count($Arr); $i++) {
                if ($i == 0)
                    $returnValue = $Arr[$i];
                else
                    $returnValue = $returnValue . "," . $Arr[$i];
            }
        }

        return $returnValue;
    }

    function follower_Insert($u_num, $fol_u_num)
    {
        $sql = "SELECT MAX(follow_idx) AS idx FROM " . TABLE_FOLLOW;
        $query = $this->db->query($sql);
        $f = $query->row();
        $follow_idx = $f->idx + 1;

        $sql = "INSERT INTO " . TABLE_FOLLOW . "(u_num , fol_u_num , follow_idx) VALUES(? , ? , ?)";
        $this->db->query($sql,array($u_num,$fol_u_num,$follow_idx));
    }

}
