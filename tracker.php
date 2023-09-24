<?php

class Tracker{

    public $category;
    public $incomes= [];
    public $expenses= [];

    public function __construct()
    {
        $this->category = new Category();
        $this->fileload();
    }

    private function fileload()
    {
        if (file_exists('incomes.txt')) {
            $this->incomes = unserialize(file_get_contents('incomes.txt'));
        }
        if (file_exists('expenses.txt')) {
            $this->expenses = unserialize(file_get_contents('expenses.txt'));
        }
    }


    public function addincome($amount, $category)
    {
        $this->incomes[] = new Income($amount, $category);
        $this->save('incomes.txt', $this->incomes);
    }

    public function addexpense($amount, $category)
    {
        $this->expenses[] = new Expense($amount, $category);
        $this->save('expenses.txt', $this->expenses);
    }

    private function save($filename, $data)
    {
        file_put_contents($filename, serialize($data));
    }

    public function currentbalance()
    {
        $totalincome = 0;
        foreach ($this->incomes as $income) {
            $totalincome += $income->getamount();
        }

        $totalexpense = 0;
        foreach ($this->expenses as $expense) {
            $totalexpense += $expense->getamount();
        }

        echo "Total Balance: " . ($totalincome - $totalexpense) . "\n";
    }

    public function viewcategories()
    {
        echo "Income Categories: " . implode(", ", $this->category->getincomecategory()) . "\n";
        echo "Expense Categories: " . implode(", ", $this->category->getexpensecategory()) . "\n";
    }

    public function viewincome()
    {
        echo "\nIncome List:\n";
        foreach ($this->incomes as $income) {
            echo "Category: " . $income->getcategory() . ", Amount: " . $income->getamount() . "\n";
        }
    }

    public function viewexpense()
    {
        echo "\nExpense List:\n";
        foreach ($this->expenses as $expense) {
            echo "Category: " . $expense->getcategory() . ", Amount: " . $expense->getamount() . "\n";
        
    }
}
}

?>