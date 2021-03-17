<?php

namespace Alibin\Common\Logs;

use Carbon\Carbon;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Class HandleLogs
 * @package Alibin\Common\Logs
 */
class HandleLogs
{
    /**
     * @param null $content
     */
    public static function handler($content = null)
    {
        $fileName = Carbon::now()->format("Y-m-d");
        $logFile = __DIR__ . "/../../../storage/logs/" . $fileName . '.log';
        $logger = new Logger('alibin');
        $logger->pushHandler(new StreamHandler($logFile, Logger::DEBUG));
        $logger->debug($content);
    }
}