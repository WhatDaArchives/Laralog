<?php

namespace spec\Laralog;

use Illuminate\Config\Repository;
use Laralog\HandlerFactory;
use Monolog\Logger;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LogServiceSpec extends ObjectBehavior
{
    function let(Logger $logger, Repository $config)
    {
        $this->beConstructedWith($logger, $config);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Laralog\LogService');
    }

    function it_can_return_the_logger_instance()
    {
        $this->getLogger()->shouldBeAnInstanceOf(Logger::class);
    }

    function it_can_push_handlers()
    {
        $this->pushHandlers(['slack']);
    }
}
