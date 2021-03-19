<?php

require __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Alibin\Sales\Sales;

/**
 * Class SalesTest
 */
class SalesTest extends TestCase
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var array
     */
    protected $credentials;

    /**
     * @var Sales
     */
    protected $sales;

    /**
     * @var array
     */
    protected $params;

    /**
     * @var integer
     */
    protected $per_page;

    public function setUp(): void
    {
        $this->sales = new Alibin\Sales\Sales();
        $this->url = 'https://api-sandbox.fpay.me/';
        $this->credentials = [
            'CLIENT_CODE' => 'FC-SB-15',
            'CLIENT_KEY' => '6ea297bc5e294666f6738e1d48fa63d2'
        ];

        $this->params = [
            'page' => 0,
            'per_page' => 50,
            'ref' => null,
            'date' => null,
            'sale' => null,
        ];
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfSales()
    {
        $this->assertInstanceOf(Sales::class, $this->sales);
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfGetFullSales()
    {
        $this->assertTrue(method_exists($this->sales, 'getFullSales'), 'Method not found: getFullSales()');
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfCancelSale()
    {
        $this->assertTrue(method_exists($this->sales, 'cancelSale'), 'Method not found: cancelSale()');
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfReversalSale()
    {
        $this->assertTrue(method_exists($this->sales, 'reversalSale'), 'Method not found: reversalSale()');
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfClientsSales()
    {
        $this->assertTrue(method_exists($this->sales, 'clientsSale'), 'Method not found: clientsSales()');
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfQuotaSales()
    {
        $this->assertTrue(method_exists($this->sales, 'quotaSales'), 'Method not found: quotaSales()');
    }
}