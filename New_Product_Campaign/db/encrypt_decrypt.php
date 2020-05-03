<?php
error_reporting(0);
$key = "#H#O#N#E#Y#M#I#N#T#";
$ENCRYPTION_KEY = '#H#O#N#E#Y#M#I#N#T#';
$ENCRYPTION_ALGORITHM = 'AES-256-CBC';


function my_encrypt($data) {
    global $ENCRYPTION_KEY;
    global $ENCRYPTION_ALGORITHM;
    $EncryptionKey = base64_decode($ENCRYPTION_KEY);
    $InitializationVector  = openssl_random_pseudo_bytes(openssl_cipher_iv_length($ENCRYPTION_ALGORITHM));
    $EncryptedText = openssl_encrypt($data, $ENCRYPTION_ALGORITHM, $EncryptionKey, 0, $InitializationVector);
    return base64_encode($EncryptedText . '::' . $InitializationVector);
}

function my_decrypt($data) {
global $ENCRYPTION_KEY;
    global $ENCRYPTION_ALGORITHM;
    $EncryptionKey = base64_decode($ENCRYPTION_KEY);
    list($Encrypted_Data, $InitializationVector ) = array_pad(explode('::', base64_decode($data), 2), 2, null);
    return openssl_decrypt($Encrypted_Data, $ENCRYPTION_ALGORITHM, $EncryptionKey, 0, $InitializationVector);
}
?>