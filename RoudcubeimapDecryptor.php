<?php
function modern_3des_decrypt($encoded, $key)
{
    // Decode base64 input
    $data = base64_decode($encoded);
    if ($data === false || strlen($data) < 8) {
        return '';
    }

    // Extract IV (first 8 bytes)
    $iv = substr($data, 0, 8);
    $ciphertext = substr($data, 8);

    // Check key length
    if (strlen($key) !== 24) {
        throw new Exception("3DES key must be exactly 24 bytes.");
    }

    // Decrypt using OpenSSL (3DES in CBC mode)
    $decrypted = openssl_decrypt($ciphertext, 'des-ede3-cbc', $key, OPENSSL_RAW_DATA, $iv);

    if ($decrypted === false) {
        return '';
    }

    // Trim null padding
    $decrypted = rtrim($decrypted, "\0");

    return $decrypted;
}

// Example usage
$encoded = 'ENCODEDTEXTHERE';
$key = 'ROUNDCUBEKEY';

$decrypted = modern_3des_decrypt($encoded, $key);
echo "Decrypted: " . $decrypted . PHP_EOL;