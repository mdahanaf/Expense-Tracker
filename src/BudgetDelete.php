<?php

namespace Ahanaf\App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


#[AsCommand(
    name: 'budget:delete',
    description: 'Get Budget of all months.',
    hidden: false
)]
class BudgetDelete extends Command
{
    protected function configure(): void
    {

        $this->addOption('month', null, InputOption::VALUE_REQUIRED, "Month of expense.");
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        if($input->getOption('month') == null){
            $output->writeln("Month is required.");
            return Command::FAILURE;
        }


        $file_data = file_get_b();

        foreach ($file_data as $i => $d) {
            if($d['month'] == $input->getOption('month')){
                unset($file_data[$i]);
                $output->writeln("Budget of month ". $input->getOption('month'). " deleted successfully.");
                file_put_b($file_data);
                
                return Command::SUCCESS;
            }
        }


        $output->writeln("Budget of month ". $input->getOption('month'). " NOT found. Try again");
        return Command::FAILURE;
    }
}
