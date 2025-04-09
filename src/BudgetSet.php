<?php

namespace Ahanaf\App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


#[AsCommand(
    name: 'budget:set',
    description: 'Set Budget of month.',
    hidden: false
)]
class BudgetSet extends Command
{
    protected function configure(): void
    {

        $this->addOption('month', null, InputOption::VALUE_REQUIRED, "Month of expense.");
        $this->addOption('amount', null, InputOption::VALUE_REQUIRED, "Amount of expense.");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {



        $file_data = file_get_b();
        $next_id =  get_next_id_b();

        if ($input->getOption('month') == null || $input->getOption('amount') == null) {
            echo "Option are missing: month and amount";
            return Command::FAILURE;
        }

        
        foreach($file_data as $data){
            if($data['month'] == $input->getOption('month')){
                $output->writeln("Budget already exists of month ". $input->getOption('month'). ". Use 'budget:update' command to update your budget.");
                return Command::FAILURE;
            }
        }

        $arr = [
            "id" => $next_id,
            "month" => $input->getOption('month'),
            "amount" => $input->getOption('amount'),
            "date" => date("Y-m-d"),
        ];

        array_push($file_data, $arr);
        file_put_b($file_data);



        return Command::SUCCESS;
    }
}
