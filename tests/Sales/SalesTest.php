<?php

require __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Alibin\Sales\SalesInterface as Sales;

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
}