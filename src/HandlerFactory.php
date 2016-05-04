<?php

namespace Laralog;

use Illuminate\Config\Repository;
use Laralog\Exceptions\UnknownHandlerException;

/**
 * Class HandlerFactory
 * @package Laralog
 */
class HandlerFactory
{
    /**
     * @var Repository
     */
    private $config;

    /**
     * HandlerFactory constructor.
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $handler
     * @return \Monolog\Handler\SlackHandler
     * @throws UnknownHandlerException
     */
    public function make(string $handler)
    {
        $handler = ucwords($handler);
        $method = "make$handler";

        if(!method_exists($this, $method)) {
            throw new UnknownHandlerException("Unknown handler $handler");
        }

        return $this->{$method}();
    }

    /**
     * Create a new Slack handler
     * @return \Monolog\Handler\SlackHandler
     */
    public function makeSlack()
    {
        $handler = new \Monolog\Handler\SlackHandler(
            $this->config->get('laralog.handlers.slack.api_key'),
            $this->config->get('laralog.handlers.slack.channel')
        );
        $handler->setFormatter(new \Monolog\Formatter\LineFormatter());

        return $handler;
    }
    
}