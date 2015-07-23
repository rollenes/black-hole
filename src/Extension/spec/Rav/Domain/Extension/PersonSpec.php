<?php

namespace spec\Rav\Domain\Extension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PersonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rav\Domain\Extension\Person');
    }
}
