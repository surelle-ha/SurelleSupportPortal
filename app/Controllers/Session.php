<?php
    session_name($ssName);
    session_start();
    $sessionLifetime = $ssTIMEOUT; 
    ini_set('session.gc_maxlifetime', $sessionLifetime);
    session_set_cookie_params($sessionLifetime);
    $sessionSavePath = dirname(__FILE__) . '/../sessions';
    if (!is_dir($sessionSavePath)) {
        mkdir($sessionSavePath, 0777, true);
    }
    ini_set('session.save_path', $sessionSavePath);
?>
