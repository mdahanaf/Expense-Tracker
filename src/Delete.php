<?php

namespace Ahanaf\App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


#[AsCommand(
    name: 'delete',
    description: 'Delete an expense with it\'s id',
    hidden: false
)]
class Delete extends Command
{
    protected function configure() : void
    {
        $this->addOption('id', null, InputOption::VALUE_REQUIRED, "Id of expense which you wanna delete.");

    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        
        if($input->getOption('id') == null){
            $output->writeln("Missing option value: id");
            return Command::FAILURE;
        }
        
        $file_data = file_get();
        $id = $input->getOption('id');
        
        $isFound = false;
        foreach($file_data as $i => $data){
            if($data['id'] == $id){
                unset($file_data[$i]);
                $isFound = true;
                break;
            }
        }

        if($isFound){
            file_put($file_data);
            $output->writeln("Expense deleted successfully");
            return Command::SUCCESS;
        }else{
            $output->writeln("Expense NOT found. Please, check your id again.");
            return Command::FAILURE;
        }


        
    }
}