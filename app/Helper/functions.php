<?php
// Function debug
function _debug($value) {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

// function Mã hóa
function _encode($value) {
    if(!$value || empty($value)) {
        return false;
    }
    return encrypt_decrypt('encrypt', $value);
}

// function Giải mã
function _decode($value) {
    if(!$value || empty($value)) {
        return false;
    }
    return encrypt_decrypt('decrypt', $value);
}

//  function thực thi mã hóa
function encrypt_decrypt($action, $string, $secret_key = '') {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    if (empty($secret_key)) {
        $secret_key = 'xuantoanstoolsversion2021';
    }
    $secret_iv = 'xuantoan secretkey iv';
    // hash
    $key = hash('sha256', $secret_key);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

