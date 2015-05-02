<?php

namespace Rav\SomeBundle\Command;

use Rav\ConfigBundle\Command\PartnerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CmdCommand extends PartnerAwareCommand
{
    protected function configure()
    {
        parent::configure();
        $this->setName('some:cmd');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->getContainer()->get('rav_config.partner')->getDomain());
    }
}
