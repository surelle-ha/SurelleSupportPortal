<?php 
    error_reporting(E_ALL & ~E_WARNING);
    date_default_timezone_set("Asia/Manila");

    include('Environment.php');
    include('Session.php');
    include('MySQL.php');
    
    include('Services/Encryption.php');
    include('Services/SystemElementStatus.php');
?>