<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function createJWT($data)
{
    $key = getenv('JWT_SECRET');
    $payload = [
        'iss' => 'api.example.com',
        'aud' => 'app.usuario',
        'iat' => time(),
        'exp' => time() + 3600,
        'data' => $data
    ];

    return JWT::encode($payload, $key, 'HS256');
}

function validateJWT($token)
{
    $key = getenv('JWT_SECRET');
    return JWT::decode($token, new Key($key, 'HS256'));
}
