<?php

namespace Rav\ConfigBundle\Command;

use Rav\ConfigBundle\Service\Partner;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class PartnerAwareCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->addArgument(
                'domain',
                InputArgument::REQUIRED,
                'Give me the domain!'
            );
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->set('rav_config.partner', new Partner($input->getArgument('domain')));
    }
} 