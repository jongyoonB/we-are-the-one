<?php

class Bulletin_board_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    function get_Board_List($category , $a , $b)
    {
        $sql = "SELECT b_con_idx , b.u_num as u_num , b_category_num , b.college_num as college_num , b_content , b_date , attach , like_count , u.u_nick  , ls_html , u.u_pic as u_pic , u.u_nick as u_nick FROM " . TABLE_BOARD . " b  , " . TABLE_USER . " u " .
            "WHERE b_category_num = ? AND b.u_num = u.u_num ORDER BY b_con_idx DESC LIMIT $a, $b";

        $query = $this->db->query($sql, array($category));


        return $query->result();
    }

    function get_Board_List_U_num($u_num , $category)
    {
        $sql = "SELECT b_con_idx , b.u_num as u_num , b_category_num , b.college_num as college_num , b_content , b_date , attach , like_count , u.u_nick  , ls_html , u.u_pic as u_pic , u.u_nick as u_nick FROM " . TABLE_BOARD . " b  , " . TABLE_USER . " u " .
            "WHERE b_category_num = ? AND b.u_num = u.u_num AND b.u_num = $u_num ORDER BY b_con_idx DESC";

        $query = $this->db->query($sql, array($category));


        return $query->result();
    }

    function get_matching_Info($u_num)
    {
        $sql = "SELECT ca.pe_category_name as pe_category_name, g.start_date as start_date, g.end_date as end_date, g.number_of_join as number_of_join, g.limit_number as limit_number, g.pe_group_idx as pe_group_idx FROM pe_join_info j , pe_group g , pe_category ca WHERE j.u_num = $u_num AND j.pe_group_idx = g.pe_group_idx AND g.pe_group_category = ca.pe_category_idx";
        $query = $this->db->query($sql);

        if($query->num_rows()) {
            return $query->result();
        } else {
            return null;
        }

    }

    function get_Board_One($b_con_idx)
    {
        $sql = "SELECT b_con_idx ,b.u_num as u_num ,b_category_num ,b_content ,b_date ,attach ,u.u_nick as u_nick ,u.u_pic as u_pic FROM " . TABLE_BOARD . " b," . TABLE_USER . " u " . " WHERE b_con_idx = $b_con_idx AND b.u_num = u.u_num";

        $query = $this->db->query($sql);

        return $query->row();
    }

    function get_Board_List_fromUser($u_num, $a, $b){
        $sql = "SELECT b_con_idx , b.u_num as u_num , b_category_num , b.college_num as college_num , b_content , b_date , attach , like_count , u.u_nick  , ls_html , u.u_pic as u_pic , u.u_nick as u_nick FROM " . TABLE_BOARD . " b  , " . TABLE_USER . " u " .
            "WHERE b.u_num = $u_num AND b.u_num = u.u_num ORDER BY b_con_idx DESC LIMIT $a, $b";

        $query = $this->db->query($sql);


        return $query->result();
    }

    function sort_Board_Num($obj)
    {
        $sort_Val = "";

        foreach($obj as $a)
        {
            if($sort_Val != "")
                $sort_Val= $sort_Val.",";

            $sort_Val= $sort_Val.$a->b_con_idx;
        }

        return $sort_Val;
    }

    function get_Board_Attach($val)
    {
        $sql = "SELECT attach_idx , a.file_type_num as file_type_num,attach_name,b_con_idx,f.file_path_info as file_path_info FROM " . TABLE_ATTACH . " a,". TABLE_FILE_TYPE . " f" . " WHERE a.file_type_num = f.file_type_num AND b_con_idx IN($val)";
        $query = $this->db->query($sql);

        return $query->result();
    }


    function sort_Files($file)
    {
        $sortArr = null;
        for ($i = 0; $i < count($file['b_pic']['name']); $i++) {
            $sortArr[$i]['name'] = $file['b_pic']['name'][$i];
            $sortArr[$i]['type'] = $file['b_pic']['type'][$i];
            $sortArr[$i]['tmp_name'] = $file['b_pic']['tmp_name'][$i];
            $sortArr[$i]['error'] = $file['b_pic']['error'][$i];
            $sortArr[$i]['size'] = $file['b_pic']['size'][$i];
        }

        return $sortArr;
    }

    function insert_Board($obj)
    {
        $date = date('Y-m-d H:i');
        $sql = "INSERT INTO " . TABLE_BOARD . "(u_num , b_category_num , college_num , b_content , b_date , attach , ls_html , like_count)
        VALUES(? , ? , ? , ? , '$date' , ? , 0 , 0)";
        $this->db->query($sql, array($obj->u_num , $obj->b_category_num , $obj->college_num , $obj->b_content , $obj-> attach));

        return $this->db->insert_id();

    }

    function insert_Attach($b_con_idx , $attach_name)
    {
        $sql = "INSERT INTO " . TABLE_ATTACH . "(file_type_num , attach_name , b_con_idx) ";
        $sql .= "VALUES(3,?,?)";
        $this->db->query($sql, array($attach_name, $b_con_idx));
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

    function pic_Upload($file, $b_con_idx)
    {
        $sql = "SELECT count(*) AS c FROM " . TABLE_ATTACH . " WHERE b_con_idx = $b_con_idx";
        $query = $this->db->query($sql);
        $num = $query->row()->c;


        $filename = strtolower($file['name']);
        $fileType = pathinfo($filename, PATHINFO_EXTENSION);
        $name = $b_con_idx."_".$num.".".$fileType;
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/public/img/b_img/";
        $return_file = "/public/img/$name";
        $target_file = $target_dir . $name;
        $check = $this->pic_Check($file);

        if ($check) {
            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                $this->insert_Attach($b_con_idx , $name);
                return $return_file;
            }
        } else {
            echo "WTF";
            return false;
        }
    }

    function set_Comment($b_idx,$comment,$u_num)
    {
        $date = date('Y-m-d H:i');
        $sql = "INSERT INTO " .TABLE_COMMENT . "(b_con_idx,c_content,c_date,u_num,like_count) ";
        $sql .= "VALUES($b_idx,'$comment','$date',$u_num,0)";

        $this->db->query($sql);
    }

    function get_Comment($b_idx,$a)
    {
        $b = 5;
        $sql = "SELECT b_con_idx,c_idx, c.u_num AS u_num, u.u_nick AS u_nick, u.u_pic AS u_pic, c_content, c_date FROM ";
        $sql .= TABLE_COMMENT . " c, " . TABLE_USER . " u ";
        $sql .= " WHERE u.u_num = c.u_num AND b_con_idx = $b_idx ORDER BY c_idx DESC LIMIT $a, $b";

        $query = $this->db->query($sql);

        return $query->result();
    }


}
