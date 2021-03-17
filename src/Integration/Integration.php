<?php

namespace Alibin\Integration;

use GuzzleHttp\Client;
use Alibin\Common\Logs\HandleLogs;

/**
 * Class Integration
 * @package Alibin\Integration
 */
class Integration
{
    /**
     * @param string $type
     * @param string $endpoint
     * @param array $credentials
     * @param null $json
     * @return \Psr\Http\Message\StreamInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function transact(string $type, string $endpoint, array $credentials, $json = null)
    {
        $client = new Client();

        $headers = [
            'Content-Type' => 'application/json',
            'Client-Code' => $credentials['CLIENT_CODE'],
            'Client-key' => $credentials['CLIENT_KEY']
        ];

        $response = $client->request($type, $endpoint, $headers);

        if ($response->getStatusCode() == 200) {
            $content = $response->getBody();
            HandleLogs::handler($content);
            return $content;
        }
    }
}