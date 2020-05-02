<?php
// $encryption_key_256bit = base64_encode(openssl_random_pseudo_bytes(32));
$key = "tX5fscLZkqb+i5cR/79KG/uOv4vN17HdIcTyuvLFZ3s=";


function my_encrypt($data,) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));.
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);

    return base64_encode($encrypted . '::' . $iv);
}

function my_decrypt($data) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}
?>