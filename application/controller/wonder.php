<?php

class wonder extends Controller
{
    function index()
    {
        require "application/views/_templates/header3.php";
        require "application/views/curious/index.php";
        require "application/views/_templates/footer3.php";
    }
}