<?php
    // Set up connection variables
    $host = 'mongodb://localhost:27017';
    $dbname = 'mydatabase';
    $username = 'myusername';
    $password = 'mypassword';

    // Set up options for MongoDB connection
    $options = [
        'username' => $username,
        'password' => $password,
        'db' => $dbname,
    ];

    // Create new MongoDB connection
    try {
        $mongo = new MongoDB\Driver\Manager($host, $options);
        echo "Connection established successfully.";
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>
