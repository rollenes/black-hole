<?php

namespace Rav\Domain\Extension;

use Rav\Domain\Name;

final class Person
{
    /**
     * @var Name
     */
    private $name;

    public function __construct(Name $name)
    {
        $this->name = $name;
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Person $person
     * @return bool
     */
    public function isEqualTo(Person $person)
    {
        return $this->name === $person->name;
    }
} 