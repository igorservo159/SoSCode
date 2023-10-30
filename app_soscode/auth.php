<?php

require_once '../vendor/autoload.php'; 

use \Firebase\JWT\Key;

$key = base64_decode("teste1");

function createToken($id) {
    global $key;

    $token_payload = array(
        "id" => $id,
        "exp" => time() + 3600
    );

    $jwt = Firebase\JWT\JWT::encode($token_payload, $key, 'HS256');
    $_SESSION['token'] = $jwt;
}


function verifyToken($jwt) {
    global $key;

    try {
        $token_payload = Firebase\JWT\JWT::decode($jwt, new Key($key, 'HS256'));
        return $token_payload;
    } catch (Exception $e) {
        return null; 
    }
}

?>

