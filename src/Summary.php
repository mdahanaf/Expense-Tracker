<?php

namespace Ahanaf\App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


#[AsCommand(
    name: 'summary',
    description: 'Show all expenses in tabular format.',
    hidden: false
)]
class Summary extends Command
{
    protected function configure(): void
    {

        $this->addOption('month', null, InputOption::VALUE_OPTIONAL, "Month of expense.");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {



        $file_data = file_get();

        if ($input->getOption('month') != null) {
            $month = $input->getOption('month');
            $sum = 0;

            foreach ($file_data as $data) {
                if ($data['month'] == $month) $sum += intval($data['amount']);
            }

            echo "Total expenses: $$sum";
            return Command::SUCCESS;
        }

        $sum = 0;
        foreach ($file_data as $data) {
            $sum += intval($data['amount']);
        }

        echo "Total expenses: $$sum";



        return Command::SUCCESS;
    }
}
