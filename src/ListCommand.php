<?php

namespace Ahanaf\App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


#[AsCommand(
    name: 'list',
    description: 'Show all expenses in tabular format.',
    hidden: false
)]
class ListCommand extends Command
{
    protected function configure(): void
    {

        $this->addOption('category', null, InputOption::VALUE_OPTIONAL, "Category of expense.");
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $file_data = file_get();
        echo "\n";
        echo str_pad("# ID", 10);
        echo str_pad("Date", 15);
        echo str_pad("Description", 20);
        echo str_pad("Month", 10);
        echo str_pad("Amount", 10);
        echo str_pad("Category", 15);
        echo "\n";
        echo "\n";


        if ($input->getOption('category') != null) {
            foreach ($file_data as $data) {
                if ($data['category'] == $input->getOption('category')) {
                    echo str_pad($data['id'], 10);
                    echo str_pad($data['date'], 15);
                    echo str_pad($data['description'], 20);
                    echo str_pad($data['month'],  10);
                    echo str_pad("$" . $data['amount'], 10);
                    echo str_pad($data['category'], 15);


                    echo "\n";
                }
            }

            return Command::SUCCESS;
        }







        foreach ($file_data as $data) {
            echo str_pad($data['id'], 10);
            echo str_pad($data['date'], 15);
            echo str_pad($data['description'], 20);
            echo str_pad($data['month'],  10);
            echo str_pad("$" . $data['amount'], 10);
            echo str_pad($data['category'], 15);


            echo "\n";
        }



        return Command::SUCCESS;
    }
}
