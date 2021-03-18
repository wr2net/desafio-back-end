<?php

namespace Alibin\Sales;

/**
 * Interface SalesInterface
 * @package Alibin\Sales
 */
interface SalesInterface
{
    /**
     * @param array $data
     * @param array $params
     * @return mixed
     */
    public function getFullSales(array $data, array $params = null);

    /**
     * @param array $data
     * @param string $sale
     * @return mixed
     */
    public function cancelSale(array $data, string $sale);

    /**
     * @param array $data
     * @param string $sale
     * @return mixed
     */
    public function reversalSale(array $data, string $sale);

    /**
     * @param array $data
     * @return mixed
     */
    public function clientsSale(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function quotaSales(array $data);
}