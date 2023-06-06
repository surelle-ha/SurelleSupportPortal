<?php

/* QUICK ENV MODIFIER */
$projectName = "Surelle Support";
$projectAuthor = "Harold Eustaquio";
$projectEnvironment = "Development"; // Development & Production
$projectVersion = date('y').'.6.625';

/* DO NOT CHANGE */

if($projectEnvironment == "Development"){
    // Domain
    $domain = 'http://localhost/';
    $provider = 'http://localhost/';
    // Database
    $dbHost = 'localhost';
    $dbName = 'surellesupport_db';
    $dbUser = 'root';
    $dbPass = 'root';
    // Session
    $ssName = 'bunnyProject';
    $ssTIMEOUT = 2000;
    // Encryption
    $encryptionKey = 'KathOneTwoOneOneOneNine';
    // News
    $newsProvider = 'https://newscatcherapi.com/';
    $newsApiKey = '8U0YdpsXqqt4UwvpX7gmmtF0SpGtF8O7hlf4b5zl0z8';
    $newsKeyword = 'Software Developer';

}else if($projectEnvironment == "Production"){
    // Domain
    $domain = 'http://surellesupport.rf.gd/';
    $provider = 'https://infinityfree.com/';
    // Database
    $dbHost = 'sql203.epizy.com';
    $dbName = 'epiz_34250155_surellesup';
    $dbUser = 'epiz_34250155';
    $dbPass = '9Y2406XMqpUl31';
    // Session
    $ssName = 'bunnyProject';
    $ssTIMEOUT = 2000;
    // Encryption
    $encryptionKey = 'KathOneTwoOneOneOneNine';
    // News
    $newsProvider = 'https://newscatcherapi.com/';
    $newsApiKey = '8U0YdpsXqqt4UwvpX7gmmtF0SpGtF8O7hlf4b5zl0z8';
    $newsKeyword = 'Virtual Assistant';

}
?>