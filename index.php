
<?php

function loadFile($filename) {
    if (file_exists($filename)) {
        $data = file_get_contents($filename);
        return explode("\n", $data);
    }
    
}

function saveFile($filename, $data) {
    $file = fopen($filename, 'a');
    fwrite($file,  $data);
    fclose($file);
}

$incomes = loadFile('incomes.txt');
$expenses = loadFile('expenses.txt');

while(true){

    echo "Expense tracker\n";
    echo "Press:1 for Add Income\n";
    echo "Press:2 for Add Expense\n";
    echo "Press:3 for View Income\n";
    echo "Press:4 for View Expene\n";
    echo "Press:5 for View Total Balance\n";
    echo "Press:0 Exit Application!\n";

    $input = readline("Enter your option: ");

    if ($input === '1') {
        $incomeAmount = readline("Enter income amount: ");
        $incomeCategory = readline("Enter income category: ");
        $income = "$incomeAmount -- $incomeCategory\n";
        saveFile('incomes.txt', $income);
    }elseif($input === '2') {
        $expenseAmount = readline("Enter expense amount: ");
        $expenseCategory = readline("Enter expense category: ");
        $expenses = "$expenseAmount -- $expenseCategory\n";
        saveFile('expenses.txt', $expenses);
    }elseif($input === '3') {
        echo "All Income\n";
        foreach($incomes as $income){
            list($amount, $category) = explode('--', $income);
            echo "Amount: $amount | Category: $category\n";
        }
    }elseif($input === '4') {

        echo "All Expense\n";
        foreach($expenses as $expense){
            list($amount, $category) = explode('--', $expense);
            echo "Amount: $amount | Category: $category\n";
        }
    }elseif($input === '5') {
        
        $totalIncome = array_sum($incomes);
        $totalExpense = array_sum($expenses);
        $balance = $totalIncome - $totalExpense;
 
        echo "\nTotal Balance: $balance\n";
    }elseif($input === '0') {
        
        echo "Exiting the expense tracker system!.\n";
        exit;
    }else{
        echo "Please choose correct option!\n";
    }
}

?>