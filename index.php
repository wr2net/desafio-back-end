<?php
header('Content-Type: application/json');
include_once __DIR__ . "/vendor/autoload.php";

use Alibin\Common\Initialize\Initialize;
use Alibin\Sales\Sales;

$url = 'https://api-sandbox.fpay.me/';
$credentials = [
    'CLIENT_CODE' => 'FC-SB-15',
    'CLIENT_KEY' => '6ea297bc5e294666f6738e1d48fa63d2'
];

$params = [
    'page' => 0,
    'per_page' => 50
];

$connection = (new Initialize())->initialize($url, $credentials);
/*
 * Get all sales
 */
//echo Sales::getFullSales($connection);

/*
 * Cancel a sale
 */
//echo Sales::cancelSale($connection, "4443-Tusj-yGXp");

/*
 * Reversal a sale
 */
//echo Sales::reversalSale($connection, "4443-Tusj-yGXp");

/*
 * Get clients with yours documents
 */
//echo Sales::clientsSale($connection);

/*
 * Get quatas from sales
 */
//echo Sales::quotaSales($connection);

exit;