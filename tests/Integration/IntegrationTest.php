<?php

require __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Alibin\Integration\Integration;


class IntegrationTest extends TestCase
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
     * @var Integration
     */
    protected $integration;

    /**
     * @var integer
     */
    protected $page;

    /**
     * @var integer
     */
    protected $per_page;

    public function setUp(): void
    {
        $this->integration = new Integration;
        $this->url = 'https://api-sandbox.fpay.me/';
        $this->page = 0;
        $this->per_page = 10;
        $this->credentials = [
            'CLIENT_CODE' => 'FC-SB-15',
            'CLIENT_KEY' => '6ea297bc5e294666f6738e1d48fa63d2'
        ];
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOf()
    {
        $this->assertInstanceOf(Integration::class, $this->integration);
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfTransact()
    {
        $this->assertTrue(method_exists($this->integration, 'transact'), 'Method not found: transact()');
    }

    /**
     * @test
     */
    public function verifySuccessForGetAllSales()
    {
        $endpoint = 'vendas?';
        $uri = $this->url . $endpoint;
        $response = $this->integration->transact('GET', $uri, $this->credentials);
        $content = json_decode($response);
        $this->assertTrue($content->success);
    }

    /**
     * @test
     */
    public function verifyNotSuccessForGetAllSales()
    {
        $uri = $this->url;
        $response = $this->integration->transact('GET', $uri, $this->credentials);
        $content = json_decode($response);
        $this->assertNotTrue($content);
    }
}