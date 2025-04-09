<?php

namespace Ahanaf\App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


#[AsCommand(
    name: 'update',
    description: 'Update a expense from the list (if exists).',
    hidden: false
)]
class Update extends Command
{
    protected function configure() : void
    {
        $this->addOption('description', null, InputOption::VALUE_OPTIONAL, "Description of expense.");

        $this->addOption('amount', null, InputOption::VALUE_OPTIONAL, "Amount of expense.");

        $this->addOption('id', null, InputOption::VALUE_REQUIRED, "Id of expense.");
        $this->addOption('category', null, InputOption::VALUE_OPTIONAL, "category of expense.");
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file_data = file_get();
        $id = $input->getOption('id');

        if($id == null){
            $output->writeln("Missing option value: id");
            return Command::FAILURE;
        }

        $idFound = false;
        foreach($file_data as $i => $data){
            if($data['id'] == $id){
                $idFound = true;

                if($input->getOption('description') != null){
                    $file_data[$i]['description'] =  $input->getOption('description');
                }


                if($input->getOption('amount') != null){
                    $file_data[$i]['amount'] = $input->getOption('amount');
                }

                if($input->getOption('category') != null){
                    $file_data[$i]['category'] = $input->getOption('category');
                }
                
                file_put($file_data);
                break;
            }
        }

        if($idFound){
            $output->writeln("Expense updated successfully.");
            return Command::SUCCESS;
        }else{
            $output->writeln("Expense NOT found. Please, check your id again.");
            return Command::FAILURE;
        }
        
        

        


        
        

        
    }
}