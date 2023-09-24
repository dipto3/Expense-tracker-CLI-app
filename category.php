<?php
class Category{
    private $incomecategory =['Salary','Medical Allowance','House Rent'];
    private $expensecategory =['Electric bill','Mobile Bill','Gas bill'];

    public function getincomecategory(){
        return $this->incomecategory;
    }
    public function getexpensecategory(){
        return $this->expensecategory;
    }

}


?>