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
     * @return false|\Psr\Http\Message\StreamInterface|string
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

        try {
            $response = $client->request($type, $endpoint, $headers);
            return $response->getBody();
        } catch (\Exception $exception) {
            return json_encode([
                'success' => false,
                'status' => $exception->getCode(),
                'error' => 'We were unable to process your request. Please check the requested requirements.',
                'message' => $exception->getMessage()
            ]);
        }
    }
}