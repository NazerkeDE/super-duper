<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $con = mysqli_connect('Localhost', 'root', '', 'project');
    if(mysqli_connect_error()){
        echo "Failed connect to MySQL ".mysql_connect_error();
        exit();
    }
