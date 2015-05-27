<?php

namespace Rav\ConfigBundle\Command;

use Rav\ConfigBundle\Service\Partner;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\DependencyInjection\Scope;

class AllPartnersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('config:partners')
            ->addArgument(
                'xcommand',
                InputArgument::REQUIRED,
                'Give me the command!'
            );;
    }


    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->addScope(new Scope('partner'));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $domains = [
            'a.com',
            'b.com',
            'kaszanka.local',
        ];

        foreach ($domains as $domain) {
            $this->getContainer()->enterScope('partner');

            $this->getContainer()->set('rav_config.partner', new Partner($domain), 'partner');

            $command = $this->getApplication()->find($input->getArgument('xcommand'));

            $newInput = new ArrayInput([$input->getArgument('xcommand'), $domain]);

            $command->execute($newInput, $output);

            $this->getContainer()->leaveScope('partner');

            $this->pause($input, $output);
        }
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