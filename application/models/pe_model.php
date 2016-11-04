<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2016-01-19
 * Time: 오후 12:05
 */

class Pe_model extends CI_Model{

    function __construct()
    {
        parent::__construct();

    }


    function get_Pe_List($category){
        $sql = "SELECT * FROM " . TABLE_PE_CATEGORY ." where pe_category_num = ?";
        $query = $this->db->query($sql,array($category));

        return $query->result();
    }

    function get_Pe_category_idx($category_link){
        $sql = "SELECT pe_category_idx FROM " . TABLE_PE_CATEGORY ." where pe_category_link = ?";
        $query = $this->db->query($sql,$category_link);

        return $query->row();
    }

    function get_Pe_category_name($category_idx){
        $sql = "SELECT pe_category_name FROM " . TABLE_PE_CATEGORY ." where pe_category_idx = ?";
        $query = $this->db->query($sql,array($category_idx));

        return $query->row();
    }

    function check_already_join($u_num, $startdate){
        $sql = "SELECT pe_join_info.pe_group_idx from pe_join_info where pe_join_info.u_num = ?";
        $query = $this->db->query($sql,array($u_num));

        $pe_group_list =  $query->result();
        if($pe_group_list){
            foreach($pe_group_list as $pe_list){
                $sql = "select count(*) as ct from pe_group where pe_group_idx = ? and (? BETWEEN start_date and (end_date - INTERVAL 1 MINUTE))";
                $query = $this->db->query($sql,array($pe_list->pe_group_idx,$startdate));

                $pe_count_duplicated =  $query->row();

                if($pe_count_duplicated->ct !=0){
                    return -1;
                }
            }
        }
        else{
            return 0;
        }

        return 0;
    }


    function available_group_list($category, $startdate){
        $sql = "select pe_group_idx from pe_group where pe_group_category = ? and ? between start_date and start_date + INTERVAL 30 MINUTE and number_of_join < pe_group.limit_number";
        $query = $this->db->query($sql,array($category,$startdate));

        return $query->result();
    }

    function check_group_exists($category_num){
        $sql = "select count(*) from pe_group where pe_group_category = ?";
        $query = $this->db->query($sql,array($category_num));

        return $query->row();
    }

    function new_group($category, $startdate){
        $sql = "insert into pe_group (pe_group_category, start_date, end_date, number_of_join, limit_number) VALUES (?, ?, (? + INTERVAL 1 HOUR), 0, 4)";
        $this->db->query($sql,array($category,$startdate,$startdate));

        return $this->db->insert_id();
    }

    function assign_group($pe_group_idx, $u_num){

        $sql = "update pe_group set number_of_join = number_of_join+1 where pe_group_idx = ?";
        $this->db->query($sql , array($pe_group_idx));

        $sql = "insert into pe_join_info (pe_group_idx, u_num) VALUES (?,?)";
        $this->db->query($sql,array($pe_group_idx,$u_num));
    }

    function get_group_info($assign_group_idx){
        $sql = "select pe_group_category, start_date, end_date, number_of_join, limit_number from pe_group where pe_group_idx = ?";
        $query = $this->db->query($sql,array($assign_group_idx));

        return $query->row();
    }

    /*function check_group_is_full($group_idx){
        $sql = "SELECT count(*) from pe_group where pe_group.pe_group_idx = :group_idx and number_of_join < pe_group.limit_number";
        $query = $this->db->prepare($sql);
        $query->bindParam(':group_idx', $group_idx);
        $query->execute();

        return $query->fetch();
    }*/


}