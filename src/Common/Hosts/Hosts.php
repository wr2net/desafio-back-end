<?php

namespace Alibin\Common\Hosts;

use Alibin\Common\Initialize\Initialize;
use Alibin\Sales\Sales;

/**
 * Class Hosts
 * @package Alibin\Common\Hosts
 */
class Hosts
{
    /**
     * @param string $url
     * @param array $credentials
     * @param array $params
     * @param string $requestUrl
     * @param string|null $key
     * @return false|mixed|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tools(string $url, array $credentials, array $params, string $requestUrl, string $key = null)
    {
        $connection = (new Initialize())->initialize($url, $credentials);

        $request = $this->handlerHost($requestUrl);

        if ($request['group'] == 'sales') {
            return $this->salesActions($request['action'], $connection, $params, $key);
        }
        return json_encode(['success' => true, 'status' => 200, 'message' => 'It`s running!']);
    }

    /**
     * @param $request
     * @return array
     */
    private function handlerHost($request)
    {
        $params = explode('/', $request);
        return [
            'group' => $params[1],
            'action' => $params[2]
        ];
    }

    /**
     * @param string $action
     * @param array $connection
     * @param array $params
     * @param string|null $key
     * @return false|mixed|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function salesActions(string $action, array $connection, array $params, string $key = null)
    {
        switch ($action) {
            case 'list':
                /* Get all sales */
                return Sales::getFullSales($connection, $params);
            case 'cancel':
                /* Cancel a sale  */
                return Sales::cancelSale($connection, $key);
            case 'reversal':
                /* Reversal a sale  */
                return Sales::reversalSale($connection, $key);
            case 'clients':
                /* Get clients with yours documents */
                return Sales::clientsSale($connection);
            case 'quotas':
                /* Get quatas from sales */
                return Sales::quotaSales($connection);
            default:
                return json_encode(['success' => true, 'status' => 200, 'message' => 'It`s running!']);
        }
    }
}