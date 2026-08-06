<?php

declare(strict_types=1);

$vaultAddr = getenv('VAULT_ADDR');
$vaultToken = getenv('VAULT_DEV_ROOT_TOKEN_ID');

$vaultAddr = "http://172.18.160.1:8200";
$vaultToken = "";

print_r($vaultAddr);
print_r($vaultToken);

$opts = [
    'http' => [
        'method' => 'GET',
        'header' => "X-Vault-Token: {$vaultToken}\r\n"
    ]
];

$url  = "{$vaultAddr}/v1/secret/data/planet/db";
$json = file_get_contents($url, false, stream_context_create($opts));
$res  = json_decode($json, true);

print_r($res);