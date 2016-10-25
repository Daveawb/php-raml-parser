<?php

namespace spec\Daveawb\RAMLParser\Util;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Daveawb\RAMLParser\Util\InputHandler');
    }

    function it_should_return_a_splFileInfo_instance()
    {
        $this->for('file')->shouldHaveType(\SplFileInfo::class);
    }
}
