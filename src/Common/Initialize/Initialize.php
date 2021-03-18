<?php

namespace Alibin\Common\Initialize;

/**
 * Class Initialize
 * @package Alibin\Common\Initialize
 */
class Initialize
{
    /**
     * @param string $url
     * @param array $credentials
     */
    public function initialize(string $url, array $credentials)
    {
        return [
            'url' => $url,
            'credentials' => $credentials
        ];
    }
}