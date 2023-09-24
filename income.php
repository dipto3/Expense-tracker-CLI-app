<?php
  class Income
  {
    private $amount;
    private $category;

    public function __construct($amount, $category)
    {
        $this->amount = $amount;
        $this->category = $category;
    }

    public function getamount()
    {
        return $this->amount;
    }

    public function getcategory()
    {
        return $this->category;
    }
  }

?>