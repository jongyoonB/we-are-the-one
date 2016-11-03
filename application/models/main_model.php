<?php

class main_model
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit("데베 연결 오류");
        }
    }


}