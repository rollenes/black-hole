<?php

namespace Rav\Extension\ExtensionBundle\Command;

use Rav\Domain\Extension\Person;
use Rav\Domain\Name;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('extension:test');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $person = new Person(new Name('Rollen'));

        $output->writeln($person->getName());
    }
} 