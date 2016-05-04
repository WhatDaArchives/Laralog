<?php

namespace Laralog;

use Laralog\Exceptions\UnknownHandlerException;

/**
 * Class HandlerFactory
 * @package Laralog
 */
class HandlerFactory
{
    /**
     * @param string $handler
     * @return \Monolog\Handler\SlackHandler
     * @throws UnknownHandlerException
     */
    public static function make(string $handler)
    {
        $handler = ucwords($handler);
        $method = "make$handler";

        if(!method_exists(__CLASS__, $method)) {
            throw new UnknownHandlerException("Unknown handler $handler");
        }

        return self::$method();
    }

    /**
     * Create a new Slack handler
     * @return \Monolog\Handler\SlackHandler
     */
    public static function makeSlack()
    {
        $handler = new \Monolog\Handler\SlackHandler(
            config('laralog.drivers.slack.api_key'),
            config('laralog.drivers.slack.channel')
        );
        $handler->setFormatter(new \Monolog\Formatter\HtmlFormatter());

        return $handler;
    }
    
}