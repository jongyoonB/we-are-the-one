<?php

class main extends Controller
{
    function index()
    {

        require "application/views/_templates/header3.php";
        require "application/views/main/index.php";
        require "application/views/_templates/footer3.php";
    }
}