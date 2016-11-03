<?php
class Controller
{
    public $db = null;

    function __construct()
    {
        $this -> dbConnect();
    }

    private function dbConnect()
    {
        $option = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ , PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this -> db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER , DB_PASS , $option);
    }

    public function loadModel($model_name)
    {
        require 'application/models/' . strtolower($model_name) . '.php';
        return new $model_name($this -> db);
    }

    public function loadTable($table_name , $value)
    {
        require 'application/models/table/' . strtolower($table_name) . '.php';
        return new $table_name($value);
    }
}