<?php

namespace Ahanaf\App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


#[AsCommand(
    name: 'add',
    description: 'Add a new expenses to the list.',
    hidden: false
)]
class Add extends Command
{
    protected function configure() : void
    {
        $this->addOption('description', null, InputOption::VALUE_REQUIRED, "Description of expense.");

        $this->addOption('amount', null, InputOption::VALUE_REQUIRED, "Amount of expense.");

        $this->addOption('month', null, InputOption::VALUE_OPTIONAL, "Month of expense. Default: Current month.");

        $this->addOption('category', null, InputOption::VALUE_REQUIRED, "Category of expense.");
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        
        if($input->getOption('description') == null || $input->getOption('amount') == null || $input->getOption('category') == null){
            $output->writeln("Missing option value: description, amount and category");
            return Command::FAILURE;
        }
        
        $file_data = file_get();
        $id = get_next_id();
        $arr = [
            "id" => $id,
            "description" => $input->getOption('description'),
            "amount" => $input->getOption('amount'),
            "date" => date("Y-m-d"),
            "month" => date("n"),
            "category" => $input->getOption('category'),
        ];

        if($input->getOption('month') != null){
            $arr['month'] = $input->getOption('month');
        }

        array_push($file_data, $arr);
        file_put($file_data);

        $output->writeln("Expense added successfully (ID: $id).");


        
        return Command::SUCCESS;

        
    }
}