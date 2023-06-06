<?php
function escapeBackslash($string) {
    return str_replace('\\', '\\\\', $string);
}  
?>