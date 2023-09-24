<?php

require_once 'category.php';
require_once 'income.php';
require_once 'expense.php';
require_once 'tracker.php';

$tracker = new Tracker();

while(true){

    echo "Expense Tracker CLI Application!!\n";
    echo "1. Add Income\n";
    echo "2. Add Expense\n";
    echo "3. View Income List\n";
    echo "4. View Expense List\n";
    echo "5. View All Categories\n";
    echo "6. View Total Balance\n";
    echo "7. Exit\n";

    
    $input = readline("Please enter your option: ");

    if ($input === '1') {
        $amount = readline("Enter income amount: ");
        $categories = $tracker->category->getincomecategory();
        echo "Income Categories: " . implode(", ", $categories) . "\n";
        $incomecategory = readline("Enter income category: ");
        if (in_array($incomecategory, $categories)) {
            $tracker->addincome($amount, $incomecategory);
            echo "Income added successfully.\n";
        } else {
            echo "Invalid income category.\n";
        }
    } elseif ($input === '2') {
        $amount = readline("Enter expense amount: ");
        $categories = $tracker->category->getexpensecategory();
        echo "Expense Categories: " . implode(", ", $categories) . "\n";
        $expensecategory = readline("Enter expense category: ");
        if (in_array($expensecategory, $categories)) {
            $tracker->addexpense($amount, $expensecategory);
            echo "Expense added successfully.\n";
        } else {
            echo "Invalid expense category\n";
        }
    } elseif ($input === '3') {
        $tracker->viewincome();
    } elseif ($input === '4') {
        $tracker->viewexpense();
    } elseif ($input === '5') {
        $tracker->viewcategories();
    } elseif ($input === '6') {
        $tracker->currentbalance();
    } elseif ($input === '7') {
        echo "Exiting the application.\n";
        exit;
    } else {
        echo "Invalid option. Please try again.\n";
    }
}

?>