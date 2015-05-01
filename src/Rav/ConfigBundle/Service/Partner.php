<?php

namespace Rav\ConfigBundle\Service;

class Partner
{
    private $domain;

    public function __construct($domain)
    {
        $this->domain = $domain;
    }

    public function getDomain()
    {
        return $this->domain;
    }
}
