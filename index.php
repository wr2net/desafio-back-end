<?php
header('Content-Type: application/json');
include_once __DIR__ . "/vendor/autoload.php";

use Alibin\Common\Hosts\Hosts;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$url = $_ENV['SANDBOX_URL'];
$credentials = [
    'CLIENT_CODE' => $_ENV['SANDBOX_CLIENT_CODE'],
    'CLIENT_KEY' => $_ENV['SANDBOX_CLIENT_KEY']
];
$params = [
    'page' => 0,
    'per_page' => 50,
    'ref' => null,
    'date' => null,
    'sale' => null,
];
$key = $_ENV['SANDBOX_SALE_KEY'];

echo (new Hosts())->tools($url, $credentials, $params, $_SERVER["REQUEST_URI"], $key);
exit;