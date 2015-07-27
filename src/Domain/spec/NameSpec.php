<?php

namespace spec\Rav\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rav\Domain\Name;

/**
 * @mixin Name
 */
class NameSpec extends ObjectBehavior
{
    function it_is_castable_tostring()
    {
        $this->beConstructedWith('test');

        $this->__toString()->shouldReturn('test');
    }
}
