<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2016-01-19
 * Time: 오후 12:05
 */

class pe_model{

    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit("데베 연결 오류");
        }
    }


    function get_Pe_List($category){
        $sql = "SELECT * FROM " . TABLE_PE_CATEGORY ." where pe_category_num = :category";
        $query = $this->db->prepare($sql);
        $query->bindParam(':category', $category, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    function get_Pe_category_idx($category_link){
        $sql = "SELECT pe_category_idx FROM " . TABLE_PE_CATEGORY ." where pe_category_link = :category_link";
        $query = $this->db->prepare($sql);
        $query->bindParam(':category_link', $category_link);
        $query->execute();
        return $query->fetch();
    }

    function get_Pe_category_name($category_idx){
        $sql = "SELECT pe_category_name FROM " . TABLE_PE_CATEGORY ." where pe_category_idx = :category_idx";
        $query = $this->db->prepare($sql);
        $query->bindParam(':category_idx', $category_idx);
        $query->execute();
        return $query->fetch();
    }

    function check_already_join($u_num, $startdate){
        $sql = "SELECT pe_join_info.pe_group_idx from pe_join_info where pe_join_info.u_num = :u_num";
        $query = $this->db->prepare($sql);
        $query->bindParam(':u_num', $u_num);
        $query->execute();
        $pe_group_list =  $query->fetchAll();
        if($pe_group_list){
            foreach($pe_group_list as $pe_list){
                $sql = "select count(*) as ct from pe_group where pe_group_idx = :pe_list and (:startdate BETWEEN start_date and (end_date - INTERVAL 1 MINUTE))";
                $query = $this->db->prepare($sql);
                $query->execute(array(':pe_list' => $pe_list->pe_group_idx, ':startdate' => $startdate));
                $pe_count_duplicated =  $query->fetch();

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
        $sql = "select pe_group_idx from pe_group where pe_group_category = :category and :startdate between start_date and start_date + INTERVAL 30 MINUTE and number_of_join < pe_group.limit_number";
        $query = $this->db->prepare($sql);
        $query->execute(array(':category'=> $category, ':startdate' => $startdate));

        return $query->fetchAll();
    }

    function check_group_exists($category_num){
        $sql = "select count(*) from pe_group where pe_group_category = :category_num";
        $query = $this->db->prepare($sql);
        $query->bindParam(':category_num', $category_num);
        $query->execute();

        return $query->fetch();
    }

    function new_group($category, $startdate){
        $sql = "insert into pe_group (pe_group_category, start_date, end_date, number_of_join, limit_number) VALUES (:category, :startdate, (:startdate + INTERVAL 1 HOUR), 0, 4)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':category'=> $category, ':startdate' => $startdate));
        return $this->db->lastInsertId();
    }

    function assign_group($pe_group_idx, $u_num){

        $sql = "update pe_group set number_of_join = number_of_join+1 where pe_group_idx = :pe_group_idx";
        $query = $this->db->prepare($sql);
        $query->bindParam(':pe_group_idx', $pe_group_idx);
        $query->execute();

        $sql = "insert into pe_join_info (pe_group_idx, u_num) VALUES (:pe_group_idx, :u_num)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':pe_group_idx' => $pe_group_idx, ':u_num' => $u_num));
    }

    function get_group_info($assign_group_idx){
        $sql = "select pe_group_category, start_date, end_date, number_of_join, limit_number from pe_group where pe_group_idx = :assign_group_idx";
        $query = $this->db->prepare($sql);
        $query->bindParam(':assign_group_idx', $assign_group_idx);
        $query->execute();
        return $query->fetch();
    }

    /*function check_group_is_full($group_idx){
        $sql = "SELECT count(*) from pe_group where pe_group.pe_group_idx = :group_idx and number_of_join < pe_group.limit_number";
        $query = $this->db->prepare($sql);
        $query->bindParam(':group_idx', $group_idx);
        $query->execute();

        return $query->fetch();
    }*/


}