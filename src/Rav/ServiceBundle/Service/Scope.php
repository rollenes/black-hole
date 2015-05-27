<?php

namespace Rav\ServiceBundle\Service;

class Scope
{
    private static $instanceCount;

    public function __construct()
    {
        self::$instanceCount++;
    }

    public function getInstanceCount()
    {
        return self::$instanceCount;
    }
} 