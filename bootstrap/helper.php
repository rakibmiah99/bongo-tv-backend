<?php


use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

if (!function_exists('userByToken')){
    function userByToken(){
        $authorization =  \request()->header('authorization');
        $authorization = explode(' ', $authorization);
        $token =  PersonalAccessToken::findToken($authorization[1]);
        $user =  User::find($token?->tokenable_id);
        return $user ?? null;
    }
}



if (!function_exists('userIdByToken')){
    function userIdByToken(){
        return userByToken()?->id;
    }
}


if (!function_exists('authCheckByToken')){
    function authCheckByToken(){
        return (bool)userByToken();
    }
}

if (!function_exists('userID')){
    function userId(){
        return auth()->id();
    }
}


if (!function_exists('authCheck')){
    function authCheck(){
        return auth()->check();
    }
}

if (!function_exists('sshEncrypt')){
    function sshEncrypt($plaintext, $key = "BongTv_32@") {
        // Generate a random initialization vector (IV)
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

        // Encrypt the plaintext using AES-256-CBC cipher
        $ciphertext = openssl_encrypt($plaintext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

        // Concatenate the IV and ciphertext
        $encryptedData = $iv . $ciphertext;

        // Encode the result in base64 to ensure it's printable
        return base64_encode($encryptedData);
    }
}

if (!function_exists('sshDecrypt')){
    function sshDecrypt($encryptedData, $key = 'BongTv_32@') {
        // Decode the base64-encoded input
        $encryptedData = base64_decode($encryptedData);

        // Extract the IV from the beginning of the encrypted data
        $ivLength = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($encryptedData, 0, $ivLength);

        // Extract the ciphertext (excluding the IV)
        $ciphertext = substr($encryptedData, $ivLength);

        // Decrypt the ciphertext using AES-256-CBC cipher
        $plaintext = openssl_decrypt($ciphertext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

        return $plaintext;
    }

}


