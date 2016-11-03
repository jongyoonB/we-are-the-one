<?php
class bulletin_board_model
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit("Database connection error");
        }
    }

    function get_Board_List($category)
    {
        $sql = "SELECT b_con_idx , b.u_num as u_num , b_category_num , b.college_num as college_num , b_content , b_date , attach , like_count , u.u_nick  , ls_html FROM " . TABLE_BOARD . " b  , " . TABLE_USER . " u " .
            "where b_category_num = :category AND b.u_num = u.u_num";
        $query = $this->db->prepare($sql);
        $query->bindParam(':category', $category, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    function insert_Board($obj)
    {
        $sql = "INSERT INTO " . TABLE_BOARD . "(u_num , b_category_num , college_num , b_content , b_date , attach , ls_html , like_count)
        VALUES(:u_num , :b_category_num , :college_num , :b_content , :b_date , :attach , :ls_html , :like_count)";
        $query = $this->db->prepare($sql);
        $query->execute(array());
    }


}