<?php 
function encrypt($plaintext, $key) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext, $key, true);
    return base64_encode($iv.$hmac.$ciphertext);
}

function decrypt($ciphertext, $key) {
    $cipher = "aes-256-cbc";
    $ciphertext = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($ciphertext, 0, $ivlen);
    $hmac = substr($ciphertext, $ivlen, $sha2len=32);
    $ciphertext = substr($ciphertext, $ivlen+$sha2len);
    $plaintext = openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext, $key, true);
    if (hash_equals($hmac, $calcmac)) {
        return $plaintext;
    } else {
        return false;
    }
}
?>