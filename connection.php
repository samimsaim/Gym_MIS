<?php
    // ----------------- Database connection -------------------
    $username = 'root';
    $password = '';
    $dbname = 'gym';
    $host = 'localhost';
    $con = mysqli_connect($host,$username,$password,$dbname);
    if(mysqli_connect_errno()){
        die("Database error!" . mysqli_connect_error()."(".mysqli_connect_errno().")");
    }
?>