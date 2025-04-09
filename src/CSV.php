<?php

namespace Ahanaf\App;

use Exception;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


#[AsCommand(
    name: 'csv',
    description: 'Export expenses in CSV format.',
    hidden: false
)]
class CSV extends Command
{

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        
        $file_data = file_get();
        $csv_data = "id,description,amount,date,month,category\n";

        foreach($file_data as $data){
            $csv_data .= $data['id']. ",";
            $csv_data .= $data['description']. ",";
            $csv_data .= $data['amount']. ",";
            $csv_data .= $data['date']. ",";
            $csv_data .= $data['month']. ",";
            $csv_data .= $data['category']. "\n";
            
        }
        
        try{
            file_put_contents(CSV_FILE_SRC, $csv_data);
            $output->writeln("CSV data exported successfully. File src: ". CSV_FILE_SRC);
            return Command::SUCCESS;
        }catch(Exception $e){
            die("CSV file data edit problem: $e");
        }


    }
}