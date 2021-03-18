## Installation

Install the latest version with

```bash
$ composer require wr2net/Desafio-Back-end
```

## Start Serve (for tests in localhost)
```bash
$ php -S localhost:8888
```

## Basic Usage

```php
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

/*
 * This not is required
 */
$params = [
    'page' => 0,
    'per_page' => 50
];

$connection = (new Initialize())->initialize($url, $credentials);

/*
 * Get all sales
 */
echo Sales::getFullSales($connection, $params);

/*
 * Cancel a sale
 */
echo Sales::cancelSale($connection, "4443-Tusj-yGXp");

/*
 * Reversal a sale
 */
echo Sales::reversalSale($connection, "4443-Tusj-yGXp");

/*
 * Get clients with yours documents
 */
echo Sales::clientsSale($connection);

/*
 * Get quatas from sales
 */
echo Sales::quotaSales($connection);
exit;
```

## About

### Requirements

- PHP 7.3 or above;
- Monolog `^2.0`;
- Carbon `^2.0`;
- Guzzle `^7.0`;

### Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/wr2net/Desafio-Back-end/issues)

### Framework Integrations

- [Laravel](http://laravel.com/) 
- [Lumen](http://lumen.laravel.com/) 

### Author

Wagner Rigoli da Rosa - <wagner@rigolidarosa.com> - <https://wagner.rigolidarosa.com>

### License

Desafio-Back-end is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
