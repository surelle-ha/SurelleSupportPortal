<?php
    $servername = $dbHost.":3306";
    $username = $dbUser;
    $password = $dbPass;
    $dbname = $dbName;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo $conn->connect_error;
    }
?>