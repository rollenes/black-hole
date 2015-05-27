<?php

namespace Rav\ServiceBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class ContainerScopeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('scope:container');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getService($output);

        $this->pause($input, $output);

        $this->getService($output);

        $this->pause($input, $output);

        $this->getService($output);
    }

    private function getService(OutputInterface $output)
    {
        $firstContainer = $this->getContainer()->get('rav_service.container');

        $output->writeln('Service instances count: ' . $firstContainer->getInstanceCount());
    }

    /**
     * @return QuestionHelper
     */
    private function getQuestionHelper()
    {
        return $this->getHelper('question');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    private function pause(InputInterface $input, OutputInterface $output)
    {
        $this->getQuestionHelper()->ask($input, $output, new Question(''));
    }
} 