<?php

namespace Alibin\Sales;

use Alibin\Integration\Integration;
use Alibin\Common\Logs\HandleLogs;

/**
 * Class Sales
 * @package Alibin\Sales
 */
class Sales implements SalesInterface
{
    const ENDPOINT_GET = 'vendas';
    const ENDPOINT = 'venda';

    /**
     * @param array $data
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFullSales(array $data, array $params = null)
    {
        $method = 'GET';
        $page = $params['page'] ?? 0;
        $per_page = $params['per_page'] ?? 10;
        $complement = 'page=' . $page . '&per_page=' . $per_page;
        $uri = $data['url'] . self::ENDPOINT_GET . '?' . $complement;

        $response = Integration::transact($method, $uri, $data['credentials']);

        return self::handlerLog($response, $method);
    }

    /**
     * @param array $data
     * @param string $sale
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelSale(array $data, string $sale)
    {
        $method = 'DELETE';
        $uri = $data['url'] . self::ENDPOINT . '/' . $sale;
        $response = Integration::transact($method, $uri, $data['credentials']);
        return self::handlerLog($response, $method);
    }

    /**
     * @param array $data
     * @param string $sale
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function reversalSale(array $data, string $sale)
    {
        $method = 'DELETE';
        $uri = $data['url'] . self::ENDPOINT . '/' . $sale . '/estornar';
        $response = Integration::transact($method, $uri, $data['credentials']);
        return self::handlerLog($response, $method);
    }

    /**
     * @param array $data
     * @return false|mixed|\Psr\Http\Message\StreamInterface|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function clientsSale(array $data)
    {
        $clients = [];
        $get_sales = self::getFullSales($data);
        $sales = json_decode($get_sales);
        if ($sales->success) {
            foreach ($sales->data as $sale) {
                $clients[] = [
                    'name' => $sale->nm_cliente,
                    'doc' => $sale->nu_documento
                ];
            }
            return json_encode($clients);
        }
        return $get_sales;
    }

    /**
     * @param array $data
     * @return false|mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function quotaSales(array $data)
    {
        $quotas = [];
        $get_sales = self::getFullSales($data);
        $sales = json_decode($get_sales);
        if ($sales->success) {
            foreach ($sales->data as $sale) {
                $quotas[] = [
                    'sale' => $sale->nu_venda,
                    'quotas' => $sale->parcelas
                ];
            }
            return json_encode($quotas);
        }
        return $get_sales;
    }

    /**
     * @param $response
     * @param $method
     * @return mixed
     */
    public function handlerLog($response, $method)
    {
        $successful = json_decode($response);
        if (!$successful->success) {
            HandleLogs::handler($method . ' SALES FAILED');
            return $response;
        }
        HandleLogs::handler($method . ' SALES SUCCESSFUL');
        return $response;
    }
}