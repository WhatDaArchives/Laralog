<?php

namespace Laralog;

use Illuminate\Config\Repository;
use Monolog\Logger;

/**
 * Class LogService
 * @package Laralog
 */
class LogService
{
    /**
     * @var Logger
     */
    protected $logger;
    /**
     * @var Repository
     */
    private $config;

    /**
     * LogService constructor.
     * @param Logger $logger
     * @param Repository $config
     */
    public function __construct(Logger $logger, Repository $config)
    {
        $this->logger = $logger;
        $this->config = $config;
    }

    /**
     * Push handlers onto Monolog
     * @param array $handlers
     * @throws Exceptions\UnknownHandlerException
     */
    public function pushHandlers(array $handlers = []) {
        $factory = new HandlerFactory($this->config);

        foreach($handlers as $handlerName) {
            $handler = $factory->make($handlerName);
            $this->logger->pushHandler($handler);
        }
    }

    /**
     * @return Logger
     */
    public function getLogger()
    {
        return $this->logger;
    }

}