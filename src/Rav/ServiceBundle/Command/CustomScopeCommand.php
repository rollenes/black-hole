<?php

namespace Rav\ServiceBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\DependencyInjection\Scope;

class CustomScopeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('scope:custom');
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->addScope(new Scope('custom'));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getServiceTwiceInCustomScope($input, $output);

        $this->pause($input, $output);

        $this->getServiceTwiceInCustomScope($input, $output);
    }


    private function getService(OutputInterface $output)
    {
        $firstContainer = $this->getContainer()->get('rav_service.custom');

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

    /**
     * @param OutputInterface $output
     */
    protected function enterScope(OutputInterface $output)
    {
        $this->getContainer()->enterScope('custom');
        $output->writeln('Entering custom scope');
    }

    /**
     * @param OutputInterface $output
     */
    protected function leaveScope(OutputInterface $output)
    {
        $this->getContainer()->leaveScope('custom');
        $output->writeln('Leaving custom scope');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    private function getServiceTwiceInCustomScope(InputInterface $input, OutputInterface $output)
    {
        $this->enterScope($output);

        $this->getService($output);

        $this->pause($input, $output);

        $this->getService($output);

        $this->pause($input, $output);

        $this->leaveScope($output);
    }
} 