<?php

namespace Ahanaf\App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


#[AsCommand(
    name: 'budget:get',
    description: 'Get Budget of all months.',
    hidden: false
)]
class BudgetGet extends Command
{


    protected function execute(InputInterface $input, OutputInterface $output): int
    {



        $file_data = file_get_b();

        echo "\n";
        echo str_pad("# ID", 10);
        echo str_pad("Date", 15);
        echo str_pad("Month", 10);
        echo str_pad("Amount", 10);
        echo "\n";
        echo "\n";

        foreach ($file_data as $d) {
            echo str_pad($d['id'], 10);
            echo str_pad($d['date'], 15);
            echo str_pad($d['month'], 10);
            echo str_pad("$". $d['amount'], 10);
            echo "\n";
        }



        return Command::SUCCESS;
    }
}
