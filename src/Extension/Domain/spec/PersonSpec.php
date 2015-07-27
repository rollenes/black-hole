<?php

namespace spec\Rav\Domain\Extension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rav\Domain\Extension\Person;
use Rav\Domain\Name;

/**
 * @mixin Person
 */
class PersonSpec extends ObjectBehavior
{
    function it_should_have_name()
    {
        $name = new Name('test');

        $this->beConstructedWith($name);

        $this->getName()->shouldBe($name);
    }
}

