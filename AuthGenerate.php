<?php
function generateToken($serverUserName, $serverPassword) {
    $credentials = "$serverUserName:$serverPassword";
    $encoded_credentials = base64_encode($credentials);
    return "Basic $encoded_credentials";
}

// $serverUserName = 'admin';
// $serverPassword = 'akmal190605';
$token = generateToken('admin', 'satahosteradmin');
echo $token;