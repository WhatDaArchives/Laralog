<?php

namespace spec\Laralog;

use Illuminate\Config\Repository;
use Laralog\HandlerFactory;
use Monolog\Handler\SlackHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HandlerFactorySpec extends ObjectBehavior
{
    function let(Repository $config)
    {
        $this->beConstructedWith($config);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(HandlerFactory::class);
    }

    function it_can_make_slack_handler()
    {
        $this->make('slack')->shouldHaveType(SlackHandler::class);
    }
}
