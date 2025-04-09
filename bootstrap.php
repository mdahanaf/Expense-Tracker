<?php

define("JSON_FILE_SRC", __DIR__ . "/expenses.json");
define("BUDGET_FILE_SRC", __DIR__ . "/budgets.json");
define("CSV_FILE_SRC", __DIR__ . "/data.csv");

if (! file_exists(JSON_FILE_SRC) || file_get() == "") {
    file_put([]);
}

if (! file_exists(BUDGET_FILE_SRC) || file_get_b() == "") {
    file_put_b([]);
}

// checking budget us execceding or not
(function (){
    $current_month = date("n");
    
    $budget_file_data = file_get_b();

    $budget_found = false;
    foreach($budget_file_data as $bdata){
        if($bdata['month'] == $current_month){
            $budget = $bdata['amount'];
            $budget_found = true;
            break;
        }
    }

    if(! $budget_found){
        echo "Warning from expense-tracker: your budget NOT found for month ". $current_month. ". Try to add it using 'budget:set' command.\n";
        return;
    }

    $expense_file_data = file_get();
    $total_expense = 0;
    foreach($expense_file_data as $edata){
        if($edata['month'] == $current_month){
            $total_expense += $edata['amount'];
        }
    }

    if($total_expense > $budget){
        echo "Warning from expense-tracker: Your expense in higher than your budget for month ". $current_month. ". Try to reduce it.\n";
    }

    //
})();