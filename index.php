<?php
header('Content-Type: application/json');
include_once __DIR__ . "/vendor/autoload.php";

use Alibin\Integration\Integration;

$url = 'https://api-sandbox.fpay.me/';
$endpoint = 'vendas?';
$page = 0;
$per_page = 10;
$credentials = [
    'CLIENT_CODE' => 'FC-SB-15',
    'CLIENT_KEY' => '6ea297bc5e294666f6738e1d48fa63d2'
];
$complement = 'page=' . $page . '&per_page=' . $per_page;
$uri = $url . $endpoint . $complement;

$response = Integration::transact('GET', $uri, $credentials);

echo $response;
exit;