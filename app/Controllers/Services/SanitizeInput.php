<?php
/*                            /*
*   Protect Project From XSS
*          Attack
*     By: Harold Eustaquio
/*                            */
    function sanitize_input($input) {
        $sanitized_input = strip_tags($input);
        $sanitized_input = htmlspecialchars($sanitized_input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $sanitized_input = trim($sanitized_input);
        return $sanitized_input;
    }
?>