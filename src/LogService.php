<?php

namespace Laralog;

use Monolog\Logger;

/**
 * Class LogService
 * @package Laralog
 */
class LogService
{

    private $handlers;

    /**
     * LogService constructor.
     * @param Logger $logger
     * @param array $handlers
     */
    public function __construct(Logger $logger, array $handlers)
    {
        $this->logger = $logger;
        $this->handlers = $handlers;
    }

    /**
     * Push handlers onto Monolog
     */
    public function pushHandlers() {
        foreach($this->handlers as $handlerName) {
            $handler = HandlerFactory::make($handlerName);
            $this->logger->pushHandler($handler);
        }
    }
}