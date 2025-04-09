<?php

use Ahanaf\App\Add;
use Ahanaf\App\BudgetDelete;
use Ahanaf\App\BudgetGet;
use Ahanaf\App\BudgetSet;
use Ahanaf\App\CSV;
use Ahanaf\App\Delete;
use Ahanaf\App\ListCommand;
use Ahanaf\App\Summary;
use Ahanaf\App\Update;
use Symfony\Component\Console\Application;


$application = new Application();


$application->add(new Add());
$application->add(new Delete());
$application->add(new Update());
$application->add(new ListCommand());
$application->add(new Summary());
$application->add(new BudgetSet());
$application->add(new BudgetGet());
$application->add(new BudgetDelete());
$application->add(new CSV());

$application->run();